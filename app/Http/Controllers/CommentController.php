<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Kegiatan;

use Illuminate\Http\Request;


class CommentController extends Controller
{
    
    public function store(Request $request, $slug)
    {
        
        $request->validate([
            'isi' => 'required',
        ], [
            'isi.required' => 'Tulis komentar terkebih dahulu!',
        ]);

        $kegiatan = Kegiatan::where('slug', $slug)->first();
        $data = [
            'user_id' => auth()->user()->id, 
            'isi' => $request->isi,
            'kegiatan_id' => $kegiatan->id,
        ];
        Comment::create($data);

        return redirect()->route('post.show', $slug)->with('success', 'Komentar berhasil ditambahkan.');

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
