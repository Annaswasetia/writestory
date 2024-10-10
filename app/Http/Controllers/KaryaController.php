<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaryaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $karya = Karya::all();
        return view('pages.karya.index', compact('karya'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.karya.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string|max:5000', // Batasi panjang konten jika diperlukan
            'category' => 'nullable|string|max:255',
        ]);

        Karya::create([
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category' => $request->input('category'),
            'user_id' => Auth::id(), // Menyimpan ID pengguna yang sedang login
        ]);

        return redirect()->route('pages.category.cerpen.index')->with('success', 'Karya berhasil dibuat!');
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
