<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Karya;

class ProfileController extends Controller
{
    public function index()
    {
        // Mendapatkan informasi pengguna yang sedang login
        $user = Auth::user();

        // Mengarahkan ke tampilan profile
        return view('pages.profile.index', compact('user'));
    }

    public function userKarya(Request $request)
    {
        $user = $request->user(); // Mendapatkan data pengguna dari request
        $karya = Karya::where('user_id', $user->id)->latest()->get();

        return view('pages.profile.karya', compact('user', 'karya'));
    }
}
