<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Puisi;
use App\Models\Karya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PuisiController extends Controller
{
    public function index()
    {
            // Mengambil semua puisi yang dipublikasikan dan mengurutkannya dari yang terbaru
        $puisi = Karya::where('category', 'puisi')
        ->where('is_published', true)
        ->orderBy('created_at', 'desc') // Mengurutkan berdasarkan waktu pembuatan (terbaru di awal)
        ->get();
         return view('pages.puisi.index', compact('puisi'));
    }

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

               // Simpan puisi ke database
            $puisi = Puisi::create([
            'user_id' => Auth::user()->id, // ID pengguna yang membuat cerpen
            'title' => $request->input('title'), // Mengambil data title dari request
            'content' => $request->input('content'), // Mengambil data content dari request
            'category' => $request->input('category'), // Mengambil data category dari request
            'is_published' => true, // Simpan sebagai dipublikasikan
        ]);

        // Redirect ke halaman daftar puisi
        return redirect()->route('puisi.index')->with('success', 'puisi berhasil disimpan!');
    }

    public function show(string $id)
    {
         // Mengambil puisi berdasarkan ID
        $puisi = Karya::where('category', 'puisi')->findOrFail($id);

        // Mengirimkan data puisi ke view 'puisi.show'
        return view('pages.puisi.show', compact('puisi'));
    }
}
