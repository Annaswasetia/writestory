<?php

use App\Http\Controllers\KaryaController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;

Route::get('/', function () {
    return view('pages.home');

});

Auth::routes();


Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/karya', [App\Http\Controllers\KaryaController::class, 'index'])->name('karya.index');

Route::get('/karya/create', [App\Http\Controllers\KaryaController::class, 'create'])->name('karya.create');

Route::post('/karya', [App\Http\Controllers\KaryaController::class, 'store'])->name('karya.store');