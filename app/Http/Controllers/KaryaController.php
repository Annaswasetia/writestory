<?php

namespace App\Http\Controllers;

use App\Models\Karya;
use App\Models\Cerpen;
use App\Models\Puisi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KaryaController extends Controller
{
    public function index()
    {
        return view('pages.karya.index');
    }

    public function create()
    {
        return view('pages.karya.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required',
            'category' => 'required|in:cerpen,puisi',
            'is_published' => 'boolean',
        ]);

        // Simpan karya ke database
        $karya = Karya::create([
            'user_id' => Auth::user()->id,
            'title' => $request->input('title'),
            'content' => $request->input('content'),
            'category' => $request->input('category'),
            'is_published' => $request->has('is_published') ? true : false,
        ]);

        // Jika karya dipublikasikan sebagai cerpen
        if ($karya->is_published) {
            if ($karya->category === 'cerpen') {
                // Simpan cerpen
                Cerpen::create([
                    'karya_id' => $karya->id,
                    'user_id' => $karya->user_id,
                    'title' => $karya->title,
                    'content' => $karya->content,
                    'category' => $karya->category,
                    'is_published' => true,
                ]);
                return redirect()->route('pages.cerpen.index')->with('success', 'Karya telah dipublikasikan dan cerpen dibuat.');
            } elseif ($karya->category === 'puisi') {
                // Simpan puisi
                Puisi::create([
                    'karya_id' => $karya->id,
                    'user_id' => $karya->user_id,
                    'title' => $karya->title,
                    'content' => $karya->content,
                    'category' => $karya->category,
                    'is_published' => true,
                ]);
                return redirect()->route('pages.puisi.index')->with('success', 'Karya telah dipublikasikan dan puisi dibuat.');
            }
        }

        // Jika karya adalah draft, hanya simpan di Karya dan tidak perlu menambahkannya ke Cerpen/Puisi
        if (!$karya->is_published) {
            // Simpan di tabel cerpen atau puisi untuk draft, tetapi jangan tampilkan di index
            if ($karya->category === 'cerpen') {
                Cerpen::create([
                    'karya_id' => $karya->id,
                    'user_id' => $karya->user_id,
                    'title' => $karya->title,
                    'content' => $karya->content,
                    'category' => $karya->category,
                    'is_published' => false, // Draft
                ]);
            } elseif ($karya->category === 'puisi') {
                Puisi::create([
                    'karya_id' => $karya->id,
                    'user_id' => $karya->user_id,
                    'title' => $karya->title,
                    'content' => $karya->content,
                    'category' => $karya->category,
                    'is_published' => false, // Draft
                ]);
            }
        }

        return redirect()->route('pages.draft.index')->with('success', 'Karya disimpan sebagai draft.');
    }



    public function show($id)
    {
        $karya = Karya::findOrFail($id); //SELECT * FROM karya WHERE id = karya_id
        return view('pages.karya.show', compact('karya'));
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        //
    }
}
