<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;


Auth::routes([
    'reset' => false,
    'verify' => false,
]);

//Register
Route::get('/register', [App\Http\Controllers\Auth\RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [App\Http\Controllers\Auth\RegisterController::class, 'register']);


//tampilan awal
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


//KARYA
Route::get('/karya', [App\Http\Controllers\KaryaController::class, 'index'])->name('karya.index');

Route::get('/karya/create', [App\Http\Controllers\KaryaController::class, 'create'])->name('karya.create');

Route::post('/karya', [App\Http\Controllers\KaryaController::class, 'store'])->name('karya.store');

//CERPEN
// Rute untuk halaman utama cerpen (menampilkan daftar cerpen yang dipublikasikan)
Route::get('/cerpen', [App\Http\Controllers\CerpenController::class, 'index'])->name('pages.category.cerpen.index');

// Rute untuk halaman detail cerpen
Route::get('/cerpen/{id}', [App\Http\Controllers\CerpenController::class, 'show'])->name('cerpen.show');

// Rute untuk menghapus cerpen
Route::delete('/cerpen/{id}', [App\Http\Controllers\CerpenController::class, 'destroy'])->name('cerpen.destroy');

//PUISI
// Rute untuk halaman utama cerpen (menampilkan daftar cerpen yang dipublikasikan)
Route::get('/puisi', [App\Http\Controllers\PuisiController::class, 'index'])->name('pages.category.puisi.index');