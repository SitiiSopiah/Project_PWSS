<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function showLogin()
    {
        return view('auth.login');
    }


    /**
     * Proses login
     */
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => [
                'required',
                'string',
            ],

            'password' => [
                'required',
                'string',
            ],
        ], [
            'username.required' => 'Username wajib diisi.',
            'password.required' => 'Password wajib diisi.',
        ]);


        // Coba login
        if (Auth::attempt([
            'username' => $credentials['username'],
            'password' => $credentials['password'],
        ], $request->boolean('remember'))) {

            // Regenerasi session untuk keamanan
            $request->session()->regenerate();

            return redirect()
                ->intended(route('dashboard'))
                ->with('success', 'Selamat datang kembali!');
        }


        // Kalau login gagal
        return back()
            ->withErrors([
                'username' => 'Username atau password salah.',
            ])
            ->withInput($request->only('username'));
    }


    /**
     * Logout
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()
            ->route('login')
            ->with('success', 'Berhasil logout.');
    }
}