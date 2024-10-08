<?php

namespace App\Http\Controllers;

use App\Models\Cerpen;
use Illuminate\Http\Request;

class CerpenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         // Mengambil semua cerpen yang dipublikasikan
         $cerpen = Cerpen::where('is_published', true)->get(); // Hanya mengambil cerpen yang dipublikasikan
         return view('pages.category.cerpen.index', compact('cerpen')); // Mengirim data ke view
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
