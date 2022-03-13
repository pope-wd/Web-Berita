<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Kategori;
use App\Models\Artikel;

class LoginController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $artikel = Artikel::all();

        return view('login.index', [
            'title' => 'login',
            'kategori' => $kategori,
            'artikel' => $artikel
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email:dns',
            'password' => ['required']
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/home');
        }

        return back()->with('LoginError', 'Login Tidak Berhasil!');
    }

    public function logout(Request $request)
    {
        Auth::logout();
    
        $request->session()->invalidate();
    
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

}