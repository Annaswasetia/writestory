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
        // mengambil 3 cerpen dan puisi
        $cerpen = Karya::where('category', 'cerpen')
                                ->where('is_published', true)
                                ->orderBy('created_at', 'desc')
                                ->take(3)
                                ->get();

        $puisi = Karya::where('category', 'puisi')
                                ->where('is_published', true)
                                ->orderBy('created_at', 'desc')
                                ->take(3)
                                ->get();

        return view('pages.home', compact('cerpen', 'puisi'));
    }
}
