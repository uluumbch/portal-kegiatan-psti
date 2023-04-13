<?php

namespace App\Http\Controllers;

use App\Models\Kegiatan;
use Illuminate\Http\Request;

class KegiatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kegiatan = Kegiatan::all();
        return view('admin.dashboard', compact('kegiatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create-edit');
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
        
        // move foto to public folder in subfolder foto-kegiatan, and prevent file name from being duplicated
        $nama_foto = time()."". $request->file('foto')->getClientOriginalName();
        $request->file('foto')->move(public_path('foto-kegiatan'), $nama_foto);
        $kegiatan['foto'] = $nama_foto;

        $kegiatan->save();


        // redirect to admin page
        return redirect('/admin')->with('status', 'Kegiatan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(Kegiatan $kegiatan)
    {
        //
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
            $nama_foto = time()."". $request->file('foto')->getClientOriginalName();
            $request->file('foto')->move(public_path('foto-kegiatan'), $nama_foto);
            $kegiatan['foto'] = $nama_foto;
        }

        $kegiatan->save();

        return redirect('/admin')->with('status', 'Kegiatan berhasil diubah!');
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
