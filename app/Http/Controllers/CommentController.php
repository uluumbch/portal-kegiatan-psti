<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Kegiatan;

use Illuminate\Http\Request;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $comment = Comment::all();
        // return view ('comment.create', compact('comment'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($slug)
    {
        //
        $kegiatan = Kegiatan::where('slug', $slug)->firstOrFail();
        $comment = new Comment;
        $comment->post_slug = $kegiatan->slug;
        return view('comment.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $slug)
    {
        $kegiatan = Kegiatan::where('slug', $slug)->firstOrFail();

        $request->validate([
            'nama' => 'required',
            'email' => 'required|email',
            'isi' => 'required',
        ], [
            'nama.required' => 'Nama tidak boleh kosong',
            'email.required' => 'email tidak boleh kosong',
            'isi.required' => 'isi tidak boleh kosong',
        ]);

        $comment = new Comment;
        $comment->post_slug = $request->post_slug;
        $comment->nama = $request->nama;
        $comment->email = $request->email;
        $comment->isi = $request->isi;


        $comment->save();

        return redirect()->back()->with('success', 'Komentar berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show($slug)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
