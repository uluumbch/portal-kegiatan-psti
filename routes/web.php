<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\SocialShareButtonsController;
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

// Route::get('/post/{slug}', function ($slug)
// {
//     return view('content', [
//         'kegiatan' => Kegiatan::where('slug', $slug)->firstOrFail()
//     ]);
// });

Route::get('/post/{slug}', [KegiatanController::class, 'show'])->name('post.show');

// Route::get('/share', [SocialShareButtonsController::class, 'share'])->name('share');

// create route with admin middleware for KegiatanController resource
Route::middleware('auth', 'admin')->group(function () {
    Route::resource('admin', KegiatanController::class);
});

// Route::resource('admin', KegiatanController::class);

// Route::get('/admin', function () {
//     return view('admin.dashboard');
// })->middleware(['auth', 'verified'])->name('admin');


// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

// add middleware for admin and prefix /admin
Route::middleware('admin')->prefix('admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('admin', KegiatanController::class);
});

// add middleware for user and prefix /user
Route::middleware('auth')->prefix('user')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::resource('user', UserController::class);
});

require __DIR__.'/auth.php';
