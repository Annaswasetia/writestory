<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
     public function index()
     {
         // Mendapatkan informasi pengguna yang sedang login
         $user = Auth::user(); 
         
         // Mengarahkan ke tampilan profile
         return view('pages.profile.index', compact('user')); 
     }
}
