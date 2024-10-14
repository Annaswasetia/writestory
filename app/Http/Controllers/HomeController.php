<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // Ambil 5 cerpen terbaru yang dipublikasikan
        $cerpen = Karya::where('category', 'cerpen')
                                ->where('is_published', true)
                                ->orderBy('created_at', 'desc')
                                ->take(3)
                                ->get();

        // Ambil 5 puisi terbaru yang dipublikasikan
        $puisi = Karya::where('category', 'puisi')
                                ->where('is_published', true)
                                ->orderBy('created_at', 'desc')
                                ->take(3)
                                ->get();

        // Kirim data cerpen dan puisi ke view home
        return view('pages.home', compact('cerpen', 'puisi'));
    }
}
