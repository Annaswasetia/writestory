<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cerpen;
use App\Models\Karya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CerpenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            // Mengambil semua cerpen yang dipublikasikan dan mengurutkannya dari yang terbaru
        $cerpen = Karya::where('category', 'cerpen')
        ->where('is_published', true)
        ->orderBy('created_at', 'desc') // Mengurutkan berdasarkan waktu pembuatan (terbaru di awal)
        ->get();
        return view('pages.cerpen.index', compact('cerpen'));
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
         // Validasi dan simpan karya
         $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'required',
            'is_published' => 'required',
            // field lain jika diperlukan
        ]);

               // Simpan cerpen ke database
               $cerpen = Cerpen::create([
                'user_id' => Auth::user()->id, // ID pengguna yang membuat cerpen
                'title' => $request->input('title'), // Mengambil data title dari request
                'content' => $request->input('content'), // Mengambil data content dari request
                'category' => $request->input('category'), // Mengambil data category dari request
                'is_published' => true, // Simpan sebagai dipublikasikan
        ]);

        // Redirect ke halaman daftar cerpen
        return redirect()->route('cerpen.index')->with('success', 'Cerpen berhasil disimpan!');
    }
    

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
            // Mengambil cerpen berdasarkan ID
        $cerpen = Cerpen::findOrFail($id);

        // Mengirimkan data cerpen ke view 'cerpen.show'
        return view('pages.cerpen.show', compact('cerpen'));
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
