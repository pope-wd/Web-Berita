<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\Kategori;
use App\Models\Artikel;
use App\Models\User;

class RegisterController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $artikel = Artikel::all();

        return view('register.index', [
            'title' => 'Register',
            'kategori' => $kategori,
            'artikel' => $artikel
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:100|unique:users',
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:4|max:255'
        ]);

        $validatedData['password'] = Hash::make($validatedData['password']);

        User::create($validatedData);

        $request->session()->flash('success', 'Registrasi Telah Berhasil, Silahkan Login');

        return redirect('/login')->with('success', 'Registrasi Telah Berhasil, Silahkan Login');
    }
}
