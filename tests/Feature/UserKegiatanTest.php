<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserKegiatanTest extends TestCase
{
    public function test_show_kegiatan_user_index_page()
    {
        $this->artisan('migrate:fresh');
        $this->seed('RolesSeeder');
        $user = \App\Models\User::where('email', 'user@mail.com')->first();
        // login as user
        $this->actingAs($user);
        // visit kegiatan index page
        $response = $this->get('/dashboard');
        // assert status 200
        $response->assertStatus(200);
    }

    public function test_user_can_register_to_kegiatan()
    {
        $this->artisan('migrate:fresh');
        $this->seed('RolesSeeder');
        $user = \App\Models\User::where('email', 'user@mail.com')->first();
        // login as user
        $this->actingAs($user);
        // create kegiatan
        $kegiatan = \App\Models\Kegiatan::factory()->create();
        // register kegiatan
        $response = $this->post('/daftarkegiatan/'.$kegiatan->id, [
            'user_id' => $user->id,
            'kegiatan_id' => $kegiatan->id,
        ]);
        // assert status 302
        $response->assertStatus(302);
        // assert redirect to kegiatanku index page
        $response->assertRedirect('/kegiatanku');
    }

    public function test_user_can_comment_to_kegiatan()
    {
        $this->artisan('migrate:fresh');
        $this->seed('RolesSeeder');
        $user = \App\Models\User::where('email', 'user@mail.com')->first();
        // login as user
        $this->actingAs($user);
        // create kegiatan
        $kegiatan = \App\Models\Kegiatan::factory()->create();
        // comment kegiatan
        $response = $this->post('/comment-store/'.$kegiatan->slug, [
            'user_id' => $user->id,
            'kegiatan_id' => $kegiatan->id,
            'isi' => 'Test Comment',
        ]);
        // assert status 302
        $response->assertStatus(302);
        // assert redirect to kegiatan index page
        $response->assertRedirect('/post/'.$kegiatan->slug);

    }

    public function test_user_can_delete_their_comment()
    {
        $this->artisan('migrate:fresh');
        $this->seed('RolesSeeder');
        $user = \App\Models\User::where('email', 'user@mail.com')->first();
        // login as user
        $this->actingAs($user);
        // create kegiatan
        $kegiatan = \App\Models\Kegiatan::factory()->create();
        // comment kegiatan
        $response = $this->post('/comment-store/'.$kegiatan->slug, [
            'user_id' => $user->id,
            'kegiatan_id' => $kegiatan->id,
            'isi' => 'Test Comment',
        ]);
        // assert status 302
        $response->assertStatus(302);
        // assert redirect to kegiatan index page
        $response->assertRedirect('/post/'.$kegiatan->slug);
        // delete comment
        $comment = \App\Models\Comment::where('isi', 'Test Comment')->first();
        $response = $this->delete('/comment/'.$comment->id);
        // assert status 302
        $response->assertStatus(302);
    }

}
