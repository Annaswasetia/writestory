<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin', function () {
        return redirect('/profil'); // Arahkan admin ke halaman profil
    });

    // Tambahkan rute lain untuk admin jika diperlukan
});


Auth::routes([
    'reset' => false,
    'verify' => false,
]);

//Login
Route::get('login', [App\Http\Controllers\Auth\LoginController::class, 'showLoginForm'])->name('login');
Route::post('login', [App\Http\Controllers\Auth\LoginController::class, 'login']);
Route::post('/logout', [App\Http\Controllers\Auth\LoginController::class, 'logout'])->name('logout');

//Register
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);

Route::get('/profil/edit', [App\Http\Controllers\ProfileController::class, 'editProfile'])->name('edit.profile')->middleware('auth');

Route::get('/karya', [App\Http\Controllers\KaryaController::class, 'index'])->name('karya.index');

Route::group(['middleware' => 'auth', 'admin'], function () {
    Route::get('karya/create', [App\Http\Controllers\KaryaController::class, 'create'])->name('karya.create');
    Route::post('karya', [App\Http\Controllers\KaryaController::class, 'store'])->name('karya.store');

    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

});

//tampilan awal
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post('/cerpen', [App\Http\Controllers\CerpenController::class, 'store'])->middleware('auth')->name('cerpen.store');


//CERPEN
// Rute untuk halaman utama cerpen (menampilkan daftar cerpen yang dipublikasikan)
Route::get('/cerpen', [App\Http\Controllers\CerpenController::class, 'index'])->name('pages.cerpen.index');

// Rute untuk halaman detail cerpen
Route::get('/cerpen/{id}', [App\Http\Controllers\CerpenController::class, 'show'])->name('pages.cerpen.show');

// Rute untuk menghapus cerpen
Route::delete('/cerpen/{id}', [App\Http\Controllers\CerpenController::class, 'destroy'])->name('cerpen.destroy');

//PUISI
// Rute untuk halaman utama cerpen (menampilkan daftar cerpen yang dipublikasikan)
Route::get('/puisi', [App\Http\Controllers\PuisiController::class, 'index'])->name('pages.puisi.index');

// Rute untuk halaman detail cerpen
Route::get('/puisi/{id}', [App\Http\Controllers\PuisiController::class, 'show'])->name('pages.puisi.show');

// Rute untuk menghapus cerpen
Route::delete('/puisi/{id}', [App\Http\Controllers\PuisiController::class, 'destroy'])->name('puisi.destroy');