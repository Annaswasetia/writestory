<?php

namespace App\Http\Controllers;

use App\Models\Puisi;
use Illuminate\Http\Request;

class PuisiController extends Controller
{
    public function index()
    {
         // Mengambil semua cerpen yang dipublikasikan
         $puisi = Puisi::where('is_published', true)->get(); // Hanya mengambil puisi yang dipublikasikan
         return view('pages.puisi.index', compact('puisi')); // Mengirim data ke view
    }
}
