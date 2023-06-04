<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $table = 'comments';
    protected $guarded = ['post_slug'];
    protected $fillable = ['nama', 'email', 'isi'];

    public function post()
    {
        return $this->belongsTo(Kegiatan::class, 'post_slug', 'slug');
    }
}
