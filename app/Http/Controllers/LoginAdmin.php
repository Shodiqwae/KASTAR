<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginAdmin extends Controller
{
    public function index()
    {
        return view('Login.LoginAdmin');
    }

    public function login(Request $request)
    {
        // Validasi data input
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba melakukan login
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Redirect sesuai peran pengguna setelah login
            return redirect()->intended($this->redirectPath());
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }


    // Redirect setelah login
    protected function redirectPath()
    {
        if (auth()->user()->role === 'admin') {
            return route('HomeA');
        } elseif (auth()->user()->role === 'petugas') {
            return route('HomeP');
        }

        return '/';
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}
