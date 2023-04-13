<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Kegiatan extends Model
{
    use HasFactory;
    use Sluggable;
    
    protected $table = 'kegiatan';
    protected $fillable = [
        'nama',
        'tanggal',
        'tempat',
        'content',
        'foto',
        'slug'
    ];

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'nama'
            ]
        ];
    }
}
