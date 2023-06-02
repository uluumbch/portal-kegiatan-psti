<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Models\Kegiatan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome', [
        'kegiatan' => Kegiatan::simplePaginate(6)
    ]);
});


use Illuminate\Database\Eloquent\Factories\Factory;
Route::get('tentang-kami', function () {
    return view('tentangkami');
});

Route::get('/post/{slug}', [KegiatanController::class, 'show'])->name('post.show');


// add middleware for admin and prefix /admin
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');

    Route::resource('admin', KegiatanController::class);
});

// add middleware for user and prefix /user
Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('user.profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('user.profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('user.profile.destroy');

    Route::resource('user', UserController::class);
});

require __DIR__.'/auth.php';
