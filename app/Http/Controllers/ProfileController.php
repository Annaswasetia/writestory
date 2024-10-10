<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
     // Method untuk menampilkan halaman profil
     public function index()
     {
         // Mendapatkan informasi pengguna yang sedang login
         $user = Auth::user(); 
         
         // Mengarahkan ke tampilan pages/profil/index
         return view('pages.profile.index', compact('user')); 
     }
}
