<?php
// app/Http/Controllers/Auth/LoginController.php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        // Lakukan validasi login di sini, ini hanya contoh sederhana
        $credentials = $request->only('email', 'password');

        if (auth()->attempt($credentials)) {
            // Jika berhasil login, redirect ke halaman yang diinginkan
            return redirect()->intended('/dashboard');
        }

        // Jika login gagal, kembali ke halaman login dengan pesan error
        return redirect()->back()->withInput($request->only('email'));
    }
}
