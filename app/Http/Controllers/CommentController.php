<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Kegiatan;

use Illuminate\Http\Request;


class CommentController extends Controller
{
    /**INI TIDAK TERPAKAI
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
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, $slug)
    {
        
        $request->validate([
            'isi' => 'required',
        ], [
            'isi.required' => 'Tulis komentar terkebih dahulu!',
        ]);

        $kegiatan = Kegiatan::where('slug', $slug)->first();
        $data = [
            'nama' => auth()->user()->name,
            'user_id' => auth()->user()->id, // 'user_id' => '1
            'email' => auth()->user()->email,
            'isi' => $request->isi,
            'star_rating' => 5, 
            'kegiatan_id' => $kegiatan->id,
        ];
        Comment::create($data);

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
        Comment::destroy($id);
        return redirect()->back()->with('success', 'Komentar berhasil dihapus.');
    }
}
