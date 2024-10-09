<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function show()
    {
        // Ambil data user yang sedang login
        $user = Auth::user();

        // Kirim data user ke view profil
        return view('pages.profile', compact('user'));
    }
}
