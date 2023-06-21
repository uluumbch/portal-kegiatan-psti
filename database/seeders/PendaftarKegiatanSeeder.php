<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PendaftarKegiatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $allUser = \App\Models\User::factory(10)->create();

        $kegiatan = \App\Models\Kegiatan::factory()->create();

        // for every user create kegiatan
        foreach ($allUser as $user) {
            \App\Models\PendaftarKegiatan::create([
                'user_id' => $user->id,
                'kegiatan_id' => $kegiatan->id,
            ]);
        }
    }
}
