<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
        public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        // Cek apakah pengguna ingin diingat
        $remember = $request->has('remember');

        if (Auth::attempt($credentials, $remember)) {
            // Cek apakah pengguna yang login adalah admin
            if (Auth::user()->role === 'admin') {
                // Jika admin, arahkan ke halaman profileadmin
                return redirect()->route('profileadmin'); // Atau bisa langsung '/profileadmin'
            } else {
                // Jika pengguna biasa (user), arahkan ke halaman profile
                return redirect()->route('profile'); // Atau bisa langsung '/profile'
            }
        }

        return back()->withErrors([
            'email' => 'Email salah.',
            'password' => 'Password salah.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        return redirect()->route('home'); 
    }
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('auth')->only('logout');
    }
}
