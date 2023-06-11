<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $fillable = ['isi', 'star_rating', 'kegiatan_id', 'user_id'];

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class, 'post_slug', 'slug');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
