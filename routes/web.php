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


//DRAFT
Route::get('/draft', [App\Http\Controllers\DraftController::class, 'showDrafts'])->name('pages.draft.index');


Route::middleware([AdminMiddleware::class])->group(function () {
    Route::get('/admin', [App\Http\Controllers\ProfileAdminController::class, 'index'])->name('profileadmin');
});

//TAMPILAN UTAMA
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

    Route::delete('/cerpen/{id}', [App\Http\Controllers\CerpenController::class, 'destroy'])->name('cerpen.destroy');
    Route::get('/cerpen/edit/{id}', [App\Http\Controllers\CerpenController::class, 'edit'])->name('pages.cerpen.edit');
    Route::put('/cerpen/{id}', [App\Http\Controllers\CerpenController::class, 'update'])->name('pages.cerpen.update');

    Route::delete('/puisi/{id}', [App\Http\Controllers\PuisiController::class, 'destroy'])->name('puisi.destroy');
    Route::get('/puisi/{id}/edit', [App\Http\Controllers\PuisiController::class, 'edit'])->name('pages.puisi.edit');
    Route::put('/puisi/{id}', [App\Http\Controllers\PuisiController::class, 'update'])->name('pages.puisi.update');

    // Route untuk menampilkan detail draft
Route::get('draft/{id}', [App\Http\Controllers\DraftController::class, 'show'])->name('pages.draft.show');

// Route untuk menampilkan halaman edit draft
Route::get('draft/{id}/edit', [App\Http\Controllers\DraftController::class, 'edit'])->name('pages.draft.edit');

// Route untuk mengupdate draft
Route::put('draft/{id}', [App\Http\Controllers\DraftController::class, 'update'])->name('pages.draft.update');

// Route untuk menghapus draft
Route::delete('draft/{id}', [App\Http\Controllers\DraftController::class, 'destroy'])->name('pages.draft.destroy');

Route::get('/profile/karya', [App\Http\Controllers\ProfileController::class, 'userKarya'])->name('pages.profile.karya');

// Rute untuk profil admin
Route::get('/profileadmin', [App\Http\Controllers\ProfileAdminController::class, 'index'])->name('pages.profileadmin.index');


});

Route::delete('/admin/user/{id}', [App\Http\Controllers\ProfileAdminController::class, 'deleteUser'])->name('admin.deleteUser')->middleware('auth');

