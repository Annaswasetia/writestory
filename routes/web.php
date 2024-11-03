<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\AdminMiddleware;

//CERPEN
Route::get('/cerpen', [App\Http\Controllers\CerpenController::class, 'index'])->name('pages.cerpen.index');
Route::get('/cerpen/{id}', [App\Http\Controllers\CerpenController::class, 'show'])->name('pages.cerpen.show'); //detail cerpen

//PUISI
Route::get('/puisi', [App\Http\Controllers\PuisiController::class, 'index'])->name('pages.puisi.index');
Route::get('/puisi/{id}', [App\Http\Controllers\PuisiController::class, 'show'])->name('pages.puisi.show'); //detail puisi

//KARYA
Route::get('/karya', [App\Http\Controllers\KaryaController::class, 'index'])->name('karya.index');

Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin', function () {
        return redirect('/profil'); // Arahkan admin ke halaman profil
    });
});

//tampilan awal
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


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

Route::group(['middleware' => 'auth', 'admin'], function () {
    Route::get('pages/home', [App\Http\Controllers\HomeController::class, 'index'])->name('pages.home');
    Route::get('/karya/create', [App\Http\Controllers\KaryaController::class, 'create'])->name('karya.create');
    Route::post('karya', [App\Http\Controllers\KaryaController::class, 'store'])->name('karya.store');

    Route::get('/profile', [App\Http\Controllers\ProfileController::class, 'index'])->name('profile');

    Route::get('/profil/edit', [App\Http\Controllers\ProfileController::class, 'editProfile'])->name('edit.profile');

    // Rute untuk menghapus cerpen (hanya admin yang bisa mengakses)
    Route::delete('/cerpen/{id}', [App\Http\Controllers\CerpenController::class, 'destroy'])->name('cerpen.destroy');

    // Rute untuk menghapus puisi (hanya admin yang bisa mengakses)
    Route::delete('/puisi/{id}', [App\Http\Controllers\PuisiController::class, 'destroy'])->name('puisi.destroy');

    // Rute untuk mengedit cerpen (hanya admin yang bisa mengakses)
    Route::get('/cerpen/edit/{id}', [App\Http\Controllers\CerpenController::class, 'edit'])->name('pages.cerpen.edit');
    Route::put('/cerpen/{id}', [App\Http\Controllers\CerpenController::class, 'update'])->name('pages.cerpen.update');

    // Rute untuk mengedit puisi (hanya admin yang bisa mengakses)
    Route::get('/puisi/{id}/edit', [App\Http\Controllers\PuisiController::class, 'edit'])->name('pages.puisi.edit');
    Route::put('/puisi/{id}', [App\Http\Controllers\PuisiController::class, 'update'])->name('pages.puisi.update');
});
