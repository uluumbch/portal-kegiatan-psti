<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Kegiatan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;


class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatan = Kegiatan::orderBy('created_at', 'desc')->simplePaginate(5);
        return view('dashboard.dashboard', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.create-edit');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // create validation
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'tempat' => 'required',
            'content' => 'required',
            'foto' => 'required',
        ], [
            'nama.required' => 'Nama Kegiatan tidak boleh kosong',
            'deskripsi.required' => 'Deskripsi Kegiatan tidak boleh kosong',
            'tanggal.required' => 'Tanggal Kegiatan tidak boleh kosong',
            'tempat.required' => 'Tempat Kegiatan tidak boleh kosong',
            'content.required' => 'Konten Kegiatan tidak boleh kosong',
            'foto.required' => 'Foto Kegiatan tidak boleh kosong',
        ]);

        // create data
        $kegiatan = new Kegiatan;
        $kegiatan->nama = $request->nama;
        $kegiatan->deskripsi = $request->deskripsi;
        $kegiatan->tanggal = $request->tanggal;
        $kegiatan->tempat = $request->tempat;
        $kegiatan->content = $request->content;
        // add kegiatan->foto to database as base64 image
        $kegiatan->foto = base64_encode(file_get_contents($request->file('foto')->getRealPath()));
        $kegiatan->save();


        // redirect to admin page
        return redirect('/admin')->with('status', 'Kegiatan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        // $rating = Comment::where('post_slug', $slug)->pluck('star_rating');
        // $averageRating = $rating->average();
        // $averageRating = round($averageRating);
        $kegiatan = Kegiatan::where('slug', $slug)->with('comments')->firstOrFail();
        $shareButton = \Share::page(
            route('post.show', $slug),
            'PSTI FT ULM Memiliki Kegiatan baru. Lihat disini : ' . $kegiatan->nama
        )
            ->facebook()
            ->twitter()
            ->linkedin()
            ->whatsapp()
            ->telegram()
            ->getRawLinks();

        return view('content', [
                    'kegiatan' => $kegiatan,
                    'averageRating' => 4,
                    'shareComponent' => $shareButton,
                ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(String $id)
    {
        return view('admin.create-edit', [
            'kegiatan' => Kegiatan::find($id),
            'title' => 'Edit'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, String $id)
    {
        // create validation
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'tanggal' => 'required',
            'tempat' => 'required',
            'content' => 'required',
        ], [
            'nama.required' => 'Nama Kegiatan tidak boleh kosong',
            'deskripsi.required' => 'Deskripsi Kegiatan tidak boleh kosong',
            'tanggal.required' => 'Tanggal Kegiatan tidak boleh kosong',
            'tempat.required' => 'Tempat Kegiatan tidak boleh kosong',
            'content.required' => 'Konten Kegiatan tidak boleh kosong',
        ]);

        // create data
        $kegiatan = Kegiatan::find($id);
        $kegiatan->nama = $request->nama;
        $kegiatan->deskripsi = $request->deskripsi;
        $kegiatan->tanggal = $request->tanggal;
        $kegiatan->tempat = $request->tempat;
        $kegiatan->content = $request->content;


        // move foto to public folder in subfolder foto-kegiatan, and prevent file name from being duplicated
        if($request->file('foto')){
            $kegiatan->foto = base64_encode(file_get_contents($request->file('foto')->getRealPath()));
        }

        $kegiatan->save();

        return redirect('/admin')->with('status', 'Kegiatan berhasil diubah!');
    }


    public function commentStore(Request $request){
        $comment = new Comment;
        $comment->post_slug = $request->post_slug;
        $comment->nama = $request->nama;
        $comment->email = $request->email;
        $comment->isi = $request->isi;
        $comment->star_rating = $request->star_rating;
        $comment->foto = $request->foto;
        $comment->save();
        return redirect('/post/'.$comment->post_slug)->with('success', 'Komentar berhasil ditambahkan.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        Kegiatan::destroy($id);
        return redirect('/admin')->with('status', 'Kegiatan berhasil dihapus!');
    }
}
