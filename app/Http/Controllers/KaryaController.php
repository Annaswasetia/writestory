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
        // Mengambil semua cerpen dan puisi
        $cerpen = Cerpen::all(); // Mengambil semua data cerpen
        $puisi = Puisi::all();   // Mengambil semua data puisi

        // Mengembalikan view dengan data cerpen dan puisi
        return view('pages.karya.index', compact('cerpen', 'puisi'));
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
            // Simpan cerpen 
            Cerpen::create([
                'karya_id' => $karya->id, // Tambahkan relasi karya_id
                'user_id' => $karya->user_id,
                'title' => $karya->title,
                'content' => $karya->content,
                'category' => $karya->category,
                'is_published' => true,
            ]);
            // Redirect ke halaman index cerpen 
            return redirect()->route('pages.cerpen.index')->with('success', 'Karya telah dipublikasikan dan cerpen dibuat.');
        } elseif ($karya->category === 'puisi') {
            // Simpan puisi 
            Puisi::create([
                'karya_id' => $karya->id, // Tambahkan relasi karya_id
                'user_id' => $karya->user_id,
                'title' => $karya->title,
                'content' => $karya->content,
                'category' => $karya->category,
                'is_published' => true,
            ]);
            // Redirect ke halaman index puisi
            return redirect()->route('pages.puisi.index')->with('success', 'Karya telah disimpan sebagai puisi.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
{
    // Mengambil semua cerpen dan puisi berdasarkan ID karya
    $cerpen = Cerpen::where('karya_id', $id)->where('category', 'cerpen')->get();
    $puisi = Puisi::where('karya_id', $id)->where('category', 'puisi')->get();

    return view('pages.karya.show', compact('cerpen', 'puisi'));
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
