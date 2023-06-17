<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendaftarKegiatan extends Model
{
    use HasFactory;

    protected $table = 'pendaftar_kegiatan';
    protected $fillable = [
        'user_id',
        'kegiatan_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function kegiatan()
    {
        return $this->belongsTo(Kegiatan::class);
    }
}
