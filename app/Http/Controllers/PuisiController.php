<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Puisi;
use App\Models\Karya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PuisiController extends Controller
{
    public function index(Request $request)
    {
        // Mulai query dasar untuk puisi yang dipublikasikan
        $query = Karya::where('category', 'puisi')
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
        $puisi = $query->get();

        // Kirim data ke view
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
            'karya_id' => 'required|exists:karya,id',
        ]);

        // Simpan puisi ke database
        $puisi = Puisi::create([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category' => $request->input('category'),
            'is_published' => true,
            'karya_id' => $request->input('karya_id'),
        ]);

        // Redirect ke halaman daftar puisi
        return redirect()->route('puisi.index')->with('success', 'puisi berhasil disimpan!');
    }

    public function show($id)
    {
        // Mengambil puisi berdasarkan ID beserta karya terkait
        $puisi = Puisi::where('karya_id', $id)->first();

        return view('pages.puisi.show', compact('puisi'));
    }

    public function edit(string $id)
    {
        $puisi = Puisi::findOrFail($id);

        // Cek apakah user adalah admin dan pemilik
        if (Auth::check() && (Auth::user()->role !== 'admin' && Auth::user()->id !== $puisi->user_id)) {
            return redirect()->route('pages.puisi.index')->with('error', 'Anda tidak memiliki izin untuk mengupdate puisi ini.');
        }

        $karya = Karya::all();

        return view('pages.puisi.edit', compact('puisi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    // Temukan cerpen berdasarkan ID
    $puisi = Puisi::findOrFail($id);

    // Hanya admin dan pemilik cerpen yang bisa mengupdate cerpen
    if (Auth::check() && (Auth::user()->role !== 'admin' && Auth::user()->id !== $puisi->user_id)) {
        return redirect()->route('pages.puisi.index')->with('error', 'Anda tidak memiliki izin untuk mengupdate puisi ini.');
    }

    // Validasi data input
    $request->validate([
        'title' => 'required|string|max:255',
        'content' => 'required|string',
        'is_published' => 'nullable|boolean',
        'karya_id' => 'required|exists:karya,id',
    ]);

    // Update cerpen dengan data baru
    $puisi->update([
        'title' => $request->title,
        'content' => $request->content,
        'karya_id' => $request->karya_id,
        'is_published' => $request->is_published ? 1 : 0,
    ]);

    // Ambil karya terkait dengan cerpen
    $karya = Karya::find($puisi->karya_id);

    if ($karya) {
        $karya->title = $puisi->title;
        $karya->content = $puisi->content;
        $karya->save();
    }

    // Redirect ke halaman daftar cerpen dengan pesan sukses atau draft berhasil diupdate
    $message = $puisi->is_published
        ? 'puisi berhasil diupdate!'
        : 'Draft puisi berhasil diupdate!';

    return redirect()->route('pages.puisi.index')->with('success', $message);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Pastikan hanya admin yang bisa menghapus
        if (Auth::check() && Auth::user()->role !== 'admin') {
            return redirect()->route('pages.puisi.index')->with('error', 'Anda tidak memiliki izin untuk menghapus cerpen ini.');
        }

        $puisi = Puisi::find($id);

        if (!$puisi) {
            return redirect()->route('pages.puisi.index')->with('error', 'Puisi tidak ditemukan.');
        }

        // Temukan karya terkait
        $karya = Karya::find($puisi->karya_id);

        // Simpan status publikasi sebelum dihapus
        $isPublished = $puisi->is_published;

        $puisi->delete();

        // Jika karya terkait tidak memiliki cerpen atau puisi lain, hapus juga karya tersebut
        if ($karya && $karya->puisi->isEmpty()) {
            $karya->delete();
        }

        // Tentukan pesan berdasarkan status publikasi
        $message = $isPublished
            ? 'Karya puisi yang dipublikasikan berhasil dihapus!'
            : 'Karya puisi yang masih draft berhasil dihapus!';

        return redirect()->route('pages.puisi.index')->with('success', $message);
    }
}
