<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\Cerpen;
use App\Models\Puisi;
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
            'category' => 'required|in:cerpen,puisi',
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
        if ($karya->category === 'cerpen') {
            // Simpan cerpen ke tabel Cerpen
            Cerpen::create([
                'user_id' => $karya->user_id,
                'title' => $karya->title,
                'content' => $karya->content,
                'category' => $karya->category,
                'is_published' => true,
            ]);

                 // Redirect ke halaman index cerpen
                return redirect()->route('pages.cerpen.index')->with('success', 'Karya telah dipublikasikan dan cerpen dibuat.');
        } elseif ($karya->category === 'puisi') {
            // Simpan puisi ke tabel Puisi (atau sistem lain jika tidak menggunakan DB)
            Puisi::create([
                'user_id' => $karya->user_id,
                'title' => $karya->title,
                'content' => $karya->content,
                'category' => $karya->category,
                'is_published' => true, // atau atur sesuai dengan logika publikasi
            ]);
                // Redirect ke halaman index puisi
                 return redirect()->route('pages.puisi.index')->with('success', 'Karya telah disimpan sebagai puisi.');

        }
        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
{
    // Coba cari di model Cerpen terlebih dahulu
    $cerpen = Cerpen::find($id);

    if ($cerpen) {
        // Jika cerpen ditemukan, kirimkan data ke view cerpen.show
        return view('cerpen.show', compact('cerpen'));
    }

    // Jika tidak ditemukan di Cerpen, coba cari di model Puisi
    $puisi = Puisi::findOrFail($id); // Jika tidak ditemukan, langsung fail

    // Jika puisi ditemukan, kirimkan data ke view puisi.show
    return view('puisi.show', compact('puisi'));
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
