<?php

use App\Providers\RouteServiceProvider;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

test('registration screen can be rendered', function () {
    $response = $this->get('/register');

    $response->assertStatus(200);
});

test('new users can register', function () {

    // migrate db for testing
    $this->artisan('migrate:fresh');
    // run artisan db:seed --class=RoleSeeder
    $this->seed('RolesSeeder');
    Storage::fake('public');
    
    $response = $this->post('/register', [
        'name' => 'Test User',
        'email' => 'test@example.com',
        'password' => 'password',
        'foto' => UploadedFile::fake()->image('profil.png'),
        'password_confirmation' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(RouteServiceProvider::HOME);
});
