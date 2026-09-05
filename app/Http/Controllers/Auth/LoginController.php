<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * TAMPILKAN HALAMAN LOGIN
     */
    public function showLogin()
    {
        // Jika sudah login & admin → langsung masuk dashboard
        if (Auth::check() && Auth::user()->role === 'admin') {
            return redirect('/dashboard');
        }

        return view('auth.login');
    }

    /**
     * PROSES LOGIN
     */
    public function login(Request $request)
{
    // Validasi input
    $request->validate([
        'email'    => 'required|email',
        'password' => 'required'
    ]);

    $credentials = $request->only('email', 'password');

    // Cek apakah email ada di database
    $user = \App\Models\User::where('email', $request->email)->first();

    if (!$user) {
        // Email tidak terdaftar
        return redirect()->route('access.denied');
    }

    // Email terdaftar → cek apakah password benar
    if (!Auth::attempt($credentials, $request->filled('remember'))) {
        // Password salah → juga dianggap tidak boleh login
        return redirect()->route('access.denied');
    }

    // Sudah login → cek role
    if (Auth::user()->role !== 'admin') {

        Auth::logout(); // logout user non-admin

        return redirect()->route('access.denied');
    }

    // Jika admin → masuk dashboard
    $request->session()->regenerate();
    return redirect()->intended('/dashboard');
}


    /**
     * LOGOUT
     */
    public function logout(Request $request)
    {
        Auth::logout();

        // Invalidate session
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
