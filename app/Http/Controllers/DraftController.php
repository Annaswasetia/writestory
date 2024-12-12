<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class DraftController extends Controller
{
    public function showDrafts()
    {
        // Ambil karya yang belum dipublikasikan (status draft) untuk pengguna yang sedang login
        $drafts = Karya::where('user_id', Auth::user()->id)
            ->where('is_published', false)
            ->orderBy('updated_at', 'desc') // Urutkan berdasarkan waktu terakhir diupdate
            ->get();

        return view('pages.draft.index', compact('drafts')); // Pastikan viewnya mengarah ke 'pages.draft.index'
    }

    // DraftController.php
    public function show($id)
    {
        // Ambil data karya berdasarkan ID
        $karya = Karya::findOrFail($id);

        // Cek kategori karya dan arahkan ke tampilan sesuai kategori
        if ($karya->category == 'cerpen') {
            return view('pages.draft.cerpenDetail', compact('karya'));
        } elseif ($karya->category == 'puisi') {
            return view('pages.draft.puisiDetail', compact('karya'));
        }

        // Jika tidak ada kategori yang sesuai, redirect atau beri pesan error
        return redirect()->route('pages.draft.index')->with('error', 'Kategori tidak ditemukan.');
    }

    public function edit($id)
    {
        // Cari karya berdasarkan ID
        $karya = Karya::findOrFail($id);

        // Tampilkan halaman edit dengan data karya
        return view('pages.draft.edit', compact('karya'));
    }
    // Menampilkan halaman edit untuk draft cerpen atau puisi
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'is_published' => 'nullable|boolean',
        ]);

        // Cari karya berdasarkan ID
        $karya = Karya::findOrFail($id);

        // Update data karya
        $karya->title = $request->input('title');
        $karya->content = $request->input('content');
        $karya->is_published = $request->has('is_published');

        // Jika kategori adalah cerpen, update data cerpen juga
        if ($karya->category == 'cerpen') {
            // Mengambil semua cerpen yang terkait dengan karya
            $cerpenList = $karya->cerpen; // Mengambil semua cerpen yang terkait

            foreach ($cerpenList as $cerpen) {
                // Update status publikasi cerpen sesuai dengan status publikasi karya
                $cerpen->is_published = $karya->is_published; // Setel status publikasi cerpen
                $cerpen->title = $request->input('title'); // Jika ingin mengupdate judul
                $cerpen->content = $request->input('content'); // Jika ingin mengupdate konten
                $cerpen->save(); // Simpan perubahan cerpen
            }
        } elseif ($karya->category == 'puisi') {
            // Mengambil semua puisi yang terkait dengan karya
            $puisiList = $karya->puisi; // Mengambil semua puisi yang terkait

            foreach ($puisiList as $puisi) {
                // Update status publikasi puisi sesuai dengan status publikasi karya
                $puisi->is_published = $karya->is_published; // Setel status publikasi puisi
                $puisi->title = $request->input('title'); // Jika ingin mengupdate judul
                $puisi->content = $request->input('content'); // Jika ingin mengupdate konten
                $puisi->save(); // Simpan perubahan puisi
            }
        }
        // Simpan perubahan karya
        $karya->save();

        if ($karya->is_published) {
            if ($karya->category == 'puisi') {
                return redirect()->route('pages.puisi.index')->with('success', 'Karya puisi berhasil dipublikasikan!');
            } elseif ($karya->category == 'cerpen') {
                return redirect()->route('pages.cerpen.index')->with('success', 'Karya cerpen berhasil dipublikasikan!');
            }
        }

        return redirect()->route('pages.draft.index')->with('success', 'Karya berhasil diperbarui!');
    }

    public function destroy($id)
    {
        // Cari karya berdasarkan ID
        $karya = Karya::findOrFail($id);

        // Hapus karya
        $karya->delete();

        return redirect()->route('pages.draft.index')->with('success', 'Karya berhasil dihapus!');
    }
}
