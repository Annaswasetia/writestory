<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Cerpen;
use App\Models\Karya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CerpenController extends Controller
{
    public function index(Request $request)
    {
        // Mulai query dasar untuk cerpen yang dipublikasikan
        $query = Karya::where('category', 'cerpen')
            ->where('is_published', true)
            ->orderBy('created_at', 'desc')
            ->orderBy('updated_at', 'desc');

        // Cek apakah ada parameter pencarian
        if ($request->has('search') && $request->search !== null) {
            $search = $request->search;

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%') // Cari di judul
                    ->orWhere('content', 'like', '%' . $search . '%') // Cari di konten
                    ->orWhereHas('user', function ($q) use ($search) { // Cari di nama user
                        $q->where('name', 'like', '%' . $search . '%');
                    });
            });
        }

        // Eksekusi query
        $cerpen = $query->get();

        // Kirim data ke view
        return view('pages.cerpen.index', compact('cerpen'));
    }


    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Memvalidasi input untuk memastikan formatnya benar sebelum disimpan.
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'content' => 'required',
            'category' => 'required',
            'is_published' => 'required',
            'karya_id' => 'required|exists:karya,id',
        ]);

        // Simpan cerpen ke database
        $cerpen = Cerpen::create([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category' => $request->input('category'),
            'is_published' => true,
            'karya_id' => $request->input('karya_id'),
        ]);

        // Redirect ke halaman daftar cerpen
        return redirect()->route('cerpen.index')->with('success', 'Cerpen berhasil disimpan!');
    }

    public function show($id)
    {
        // Mengambil id karya yang terkait dengan id cerpen
        $cerpen = Cerpen::where('karya_id', $id)->first(); //SELECT * FROM cerpen WHERE karya_id = $id 

        return view('pages.cerpen.show', compact('cerpen'));
    }

    public function edit(string $id)
    {
        $cerpen = Cerpen::findOrFail($id);

        // Cek apakah user adalah admin dan pemilik
        if (Auth::check() && (Auth::user()->role !== 'admin' && Auth::user()->id !== $cerpen->user_id)) {
            return redirect()->route('pages.cerpen.index')->with('error', 'Anda tidak memiliki izin untuk mengedit cerpen ini.');
        }

        $karya = Karya::all();

        return view('pages.cerpen.edit', compact('cerpen', 'karya'));
    }

    public function update(Request $request, $id)
    {
        // Temukan cerpen berdasarkan ID
        $cerpen = Cerpen::findOrFail($id);

        // Hanya admin dan pemilik cerpen yang bisa mengupdate cerpen
        if (Auth::check() && (Auth::user()->role !== 'admin' && Auth::user()->id !== $cerpen->user_id)) {
            return redirect()->route('pages.cerpen.index')->with('error', 'Anda tidak memiliki izin untuk mengupdate cerpen ini.');
        }

        // Validasi data input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'is_published' => 'nullable|boolean',
            'karya_id' => 'required|exists:karya,id',
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

        if ($karya) {
            $karya->title = $cerpen->title;
            $karya->content = $cerpen->content;
            $karya->save();
        }

        // Redirect ke halaman daftar cerpen dengan pesan sukses atau draft berhasil diupdate
        $message = $cerpen->is_published
            ? 'Cerpen berhasil diupdate!'
            : 'Draft cerpen berhasil diupdate!';

        return redirect()->route('pages.cerpen.index')->with('success', $message);
    }

    public function destroy($id)
    {
        // Pastikan hanya admin yang bisa menghapus
        if (Auth::check() && Auth::user()->role !== 'admin') {
            return redirect()->route('pages.cerpen.index')->with('error', 'Anda tidak memiliki izin untuk menghapus cerpen ini.');
        }

        // Temukan cerpen berdasarkan ID
        $cerpen = Cerpen::find($id);

        if (!$cerpen) {
            return redirect()->route('pages.cerpen.index')->with('error', 'Cerpen tidak ditemukan.');
        }

        // Temukan karya terkait
        $karya = Karya::find($cerpen->karya_id);

        // Simpan status publikasi sebelum dihapus
        $isPublished = $cerpen->is_published;

        // Hapus cerpen
        $cerpen->delete();

        // Jika karya terkait tidak memiliki cerpen atau puisi lain, hapus juga karya tersebut
        if ($karya && $karya->cerpen->isEmpty()) {
            $karya->delete();
        }

        // Tentukan pesan berdasarkan status publikasi
        $message = $isPublished
            ? 'Karya cerpen yang dipublikasikan berhasil dihapus!'
            : 'Karya cerpen yang masih draft berhasil dihapus!';

        return redirect()->route('pages.cerpen.index')->with('success', $message);
    }
}
