<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KegiatanTest extends TestCase
{
    /**
     * A test for kegiatan index page.
     */
    public function test_show_kegiatan_admin_index_page()
    {
        $this->artisan('migrate:fresh');
        $this->seed('RolesSeeder');
        $user = \App\Models\User::where('email', 'admin@mail.com')->first();
        // login as admin
        $this->actingAs($user);
        // visit kegiatan index page
        $response = $this->get('/dashboard');
        // assert status 200
        $response->assertStatus(200);
    }

    public function test_add_kegiatan_admin_page()
    {
        $this->artisan('migrate:fresh');
        $this->seed('RolesSeeder');
        $user = \App\Models\User::where('email', 'admin@mail.com')->first();
        // login as admin
        $this->actingAs($user);
        // visit kegiatan index page
        $response = $this->get('/dashboard');
        // assert status 200
        $response->assertStatus(200);
        // visit kegiatan create page
        $response = $this->get('/admin/create');
        // assert status 200
        $response->assertStatus(200);
        // add kegiatan
        $response = $this->post('/admin', [
            'nama' => 'Test Judul',
            'deskripsi' => 'Test Deskripsi',
            'foto' => \Illuminate\Http\UploadedFile::fake()->image('foto.jpg'),
            'tanggal' => '2021-01-01',
            'tempat' => 'Test Tempat',
            'slug' => 'https://www.google.com',
            'content' => 'Test Content',
        ]);
        // assert status 302
        $response->assertStatus(302);
        // assert redirect to kegiatan index page
        $response->assertRedirect('/dashboard');
    }

    public function test_edit_kegiatan_admin_page()
    {
        $this->artisan('migrate:fresh');
        $this->seed('RolesSeeder');
        $user = \App\Models\User::where('email', 'admin@mail.com')->first();
        // login as admin
        $this->actingAs($user);
        // create kegiatan
        $kegiatan = \App\Models\Kegiatan::factory()->create();
        
        // visit kegiatan index page
        $response = $this->get('/dashboard');
        // assert status 200
        $response->assertStatus(200);
        // visit kegiatan edit page
        $response = $this->get('/admin/'.$kegiatan->id.'/edit');
        // assert status 200
        $response->assertStatus(200);
        // edit kegiatan
        $response = $this->put('/admin/'.$kegiatan->id, [
            'nama' => 'Test Judul',
            'deskripsi' => 'Test Deskripsi',
            'foto' => \Illuminate\Http\UploadedFile::fake()->image('foto.jpg'),
            'tanggal' => '2021-01-01',
            'tempat' => 'Test Tempat',
            'slug' => 'https://www.google.com',
            'content' => 'Test Content',
        ]);
        // assert status 302
        $response->assertStatus(302);
        // assert redirect to kegiatan index page
        $response->assertRedirect('/dashboard');
        
    }

    public function test_delete_kegiatan_admin_page()
    {
        $this->artisan('migrate:fresh');
        $this->seed('RolesSeeder');
        $user = \App\Models\User::where('email', 'admin@mail.com')->first();
        // login as admin
        $this->actingAs($user);
        // create kegiatan
        $kegiatan = \App\Models\Kegiatan::factory()->create();
        
        // visit kegiatan index page
        $response = $this->get('/dashboard');
        // assert status 200
        $response->assertStatus(200);
        // delete kegiatan
        $response = $this->delete('/admin/'.$kegiatan->id);
        // assert status 302
        $response->assertStatus(302);
        // assert redirect to kegiatan index page
        $response->assertRedirect('/dashboard');
    }
}

