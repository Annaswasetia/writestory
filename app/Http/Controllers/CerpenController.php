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
            ->orderBy('updated_at', 'desc')
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
            'karya_id' => 'required|exists:karya,id', // Validasi untuk karya_id
            // field lain jika diperlukan
        ]);

        // Simpan cerpen ke database
        $cerpen = Cerpen::create([
            'user_id' => Auth::user()->id, // ID pengguna yang membuat cerpen
            'title' => $request->input('title'), // Mengambil data title dari request
            'content' => $request->input('content'), // Mengambil data content dari request
            'category' => $request->input('category'), // Mengambil data category dari request
            'is_published' => true, // Simpan sebagai dipublikasikan
            'karya_id' => $request->input('karya_id'), // Menyimpan karya_id
        ]);

        // Redirect ke halaman daftar cerpen
        return redirect()->route('cerpen.index')->with('success', 'Cerpen berhasil disimpan!');
    }


    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        // Mengambil puisi berdasarkan ID beserta karya terkait
        $cerpen = Cerpen::where('karya_id',$id)->first();
    
        return view('pages.cerpen.show', compact('cerpen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $cerpen = Cerpen::findOrFail($id);

        // Cek apakah user adalah admin
        if (Auth::check() && Auth::user()->role !== 'admin') {
            return redirect()->route('pages.karya.index')->with('error', 'Anda tidak memiliki akses untuk mengedit cerpen ini.');
        }

        $karya = Karya::all(); // Pastikan model Karya di-import

        return view('pages.cerpen.edit', compact('cerpen', 'karya'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Temukan cerpen berdasarkan ID
        $cerpen = Cerpen::findOrFail($id);

        // Pastikan hanya admin yang bisa mengupdate cerpen
        if (Auth::check() && Auth::user()->role !== 'admin') {
            return redirect()->route('pages.home')->with('error', 'Anda tidak memiliki akses untuk mengubah cerpen ini.');
        }

        // Validasi data input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'is_published' => 'nullable|boolean',
            'karya_id' => 'required|exists:karya,id', // Validasi untuk karya_id
        ]);

        // Update cerpen dengan data baru
        $cerpen->update([
            'title' => $request->title,
            'content' => $request->content,
            'karya_id' => $request->karya_id,
            'is_published' => $request->is_published ? 1 : 0,
        ]);

        // Ambil karya terkait dengan cerpen
        $karya = Karya::find($cerpen->karya_id);

        // Jika karya ditemukan, perbarui informasi yang diperlukan
        if ($karya) {
            // Update field di karya dengan informasi dari cerpen
            $karya->title = $cerpen->title; // Mengupdate judul karya
            $karya->content = $cerpen->content; // Mengupdate konten karya atau field lain yang relevan
            $karya->save(); // Simpan perubahan pada karya
        }

        // Redirect ke halaman daftar cerpen dengan pesan sukses
        return redirect()->route('pages.cerpen.index')->with('success', 'Cerpen berhasil diupdate!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Pastikan hanya admin yang bisa menghapus
        if (Auth::check() && Auth::user()->role !== 'admin') {
            return redirect()->route('pages.cerpen.index')->with('error', 'Anda tidak memiliki akses untuk menghapus cerpen.');
        }

        // Temukan cerpen berdasarkan ID
        $cerpen = Cerpen::find($id);

        if (!$cerpen) {
            return redirect()->route('pages.cerpen.index')->with('error', 'Cerpen tidak ditemukan.');
        }

        // Temukan karya terkait
        $karya = Karya::find($cerpen->karya_id);

        // Hapus cerpen terlebih dahulu
        $cerpen->delete();

        // Jika karya terkait tidak memiliki cerpen atau puisi lain, hapus juga karya tersebut
        if ($karya && $karya->cerpen->isEmpty()) {
            $karya->delete();
        }

        return redirect()->route('pages.cerpen.index')->with('success', 'Cerpen berhasil dihapus!!');
    }
}
