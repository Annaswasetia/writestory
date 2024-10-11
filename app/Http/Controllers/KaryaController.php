<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\Cerpen;
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
            'content' => 'required',
            'category' => 'required',
            'is_published' => 'required',
        ]);

           // Simpan karya ke database
    $karya = Karya::create([
        'user_id' => Auth::user()->id, // ID pengguna yang membuat karya
        'title' => $request->input('title'), // Mengambil data title dari request
        'content' => $request->input('content'), // Mengambil data content dari request
        'category' => $request->input('category'), // Mengambil data category dari request
        'is_published' => $request->has('is_published'), // Menyimpan status publish berdasarkan checkbox
    ]);

        // Jika karya dipublikasikan sebagai cerpen
        if ($karya->is_published) {
            // Simpan cerpen ke tabel Cerpen
            Cerpen::create([
                'user_id' => $karya->user_id,
                'title' => $karya->title,
                'content' => $karya->content,
                'category' => $karya->category,
                'is_published' => true,
            ]);

        return redirect()->route('pages.cerpen.index')->with('success', 'Karya telah dipublikasikan dan cerpen dibuat.');

        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
            // Mengambil cerpen berdasarkan ID
        $cerpen = Cerpen::findOrFail($id);

        // Mengirimkan data cerpen ke view 'cerpen.show'
        return view('cerpen.show', compact('cerpen'));
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
