<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        // $response = Http::post('http://localhost:8001/login', [ // Lumen endpoint
        //     'email' => $request->email,
        //     'password' => $request->password,
        // ]);

        // if ($response->successful()) {
        //     // Simpan user dan token ke session (sementara)
        //     session(['user' => $response['user']]);
        //     return redirect()->route('kegiatan');
        // }
        
        // return back()->with('error', 'Email atau password salah');

        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
 
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
 
            return redirect()->route('test.index');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');

    }

    public function kegiatan()
    {
        $response = Http::get('http://localhost:8001/kegiatan');
        return view('kegiatan', ['kegiatan' => $response->json()]);
    }
}
