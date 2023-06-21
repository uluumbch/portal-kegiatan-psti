<?php

namespace App\Http\Controllers;

use App\Mail\AfterRegister;
use App\Models\Kegiatan;
use App\Models\PendaftarKegiatan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;


class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatan = Kegiatan::orderBy('created_at', 'asc')->simplePaginate(5);
        
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


        // redirect to dashboard page
        return redirect(route('dashboard'))->with('status', 'Kegiatan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {
        $kegiatan = Kegiatan::where('slug', $slug)->with('comments', 'pendaftarKegiatan')->firstOrFail();
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
        return view('dashboard.create-edit', [
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

        return redirect(route('dashboard'))->with('status', 'Kegiatan berhasil diubah!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(String $id)
    {
        Kegiatan::destroy($id);
        return redirect(route('dashboard'))->with('status', 'Kegiatan berhasil dihapus!');
    }

    public function kegiatan()
    {
        $kegiatanTerdaftar = PendaftarKegiatan::where('user_id', auth()->user()->id)->with('kegiatan')->get();
        return view('dashboard.kegiatanku', compact('kegiatanTerdaftar'));
    }
    public function konfirmasiDaftarKegiatan($slug)
    {
        $kegiatan = Kegiatan::where('slug', $slug)->firstOrFail();
        return view('dashboard.daftar-kegiatan', compact('kegiatan'));
    }
// create function to add registration functinality, user can register to a kegaitan
    public function daftarKegiatan($kegiatan_id)
    {
        $data = [
            'user_id' => auth()->user()->id,
            'kegiatan_id' => $kegiatan_id,
        ];
        PendaftarKegiatan::create($data);
        $details = Kegiatan::find($kegiatan_id);
        Mail::to(auth()->user()->email)->send(new AfterRegister($details));
        return redirect(route('kegiatanku'))->with('status', 'Pendaftaran berhasil!');
    }

    public function pendaftarKegiatan(String $kegiatan_id)
    {
        $pendaftarKegiatan = PendaftarKegiatan::where('kegiatan_id', $kegiatan_id)->with('user','kegiatan')->get();
        return view('dashboard.pendaftar-kegiatan', compact('pendaftarKegiatan'));
    }

}
