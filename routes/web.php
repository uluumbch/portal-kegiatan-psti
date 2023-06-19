<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\KegiatanController;
use App\Http\Controllers\CommentController;
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



Route::get('tentang-kami', function () {
    return view('tentangkami');
});


Route::get('/post/{slug}', [KegiatanController::class, 'show'])->name('post.show');


// Route::get('/post/{slug}/comment/create', [CommentController::class, 'create'])->name('comment.create');
// Route::post('/post/{slug}/comment', [CommentController::class, 'store'])->name('comment.store');


// add middleware for admin and prefix /admin
// Route::middleware('admin')->prefix('admin')->group(function () {
    // Route::get('/profile', [ProfileController::class, 'edit'])->name('admin.profile.edit');
    // Route::patch('/profile', [ProfileController::class, 'update'])->name('admin.profile.update');
    // Route::delete('/profile', [ProfileController::class, 'destroy'])->name('admin.profile.destroy');


// });

// add middleware for user and prefix /user
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/comment-store/{slug}', [CommentController::class, 'store'])->name('comment.store');
    Route::delete('/comment/{id}', [CommentController::class, 'destroy'])->name('comment.destroy');

    // Route::resource('user', UserController::class);

    Route::get('/dashboard', [KegiatanController::class, 'index'])->name('dashboard');

    Route::get('/kegiatanku', [KegiatanController::class, 'kegiatan'])->name('kegiatanku');
    Route::get('/daftarkegiatan/{slug}', [KegiatanController::class, 'konfirmasiDaftarkegiatan'])->name('konfirmasiDaftarkegiatan');
    Route::post('/daftarkegiatan/{kegiatan_id}', [KegiatanController::class, 'daftarkegiatan'])->name('daftarkegiatan');

    Route::resource('admin', KegiatanController::class)->except(['index']);
});




require __DIR__.'/auth.php';
