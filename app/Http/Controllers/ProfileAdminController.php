<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Cerpen;
use App\Models\Puisi;
use App\Models\Karya;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class ProfileAdminController extends Controller
{
    public function index()
    {
        $karya = Karya::where('is_published', true)->with('user')->get();

    // Mengambil semua pengguna yang terdaftar
    $users = User::all();  // Sesuaikan query ini jika kamu ingin mengambil pengguna tertentu saja

    // Kirim data karya dan pengguna ke view profileadmin.index
    return view('pages.profileadmin.index', compact('karya', 'users'));
    }

    public function deleteUser($id)
{
    // Pastikan hanya admin yang bisa menghapus
    if (Auth::user()->role !== 'admin') {
        return redirect()->back()->with('error', 'You are not authorized to delete users.');
    }

    // Mencari pengguna berdasarkan ID
    $user = User::findOrFail($id);

    // Menghapus pengguna
    $user->delete();

    return redirect()->back()->with('success', 'User deleted successfully.');
}

    

}
