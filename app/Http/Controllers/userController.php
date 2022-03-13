<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\User;
use App\Models\Artikel;

class userController extends Controller
{
    public function spesificUser($slug)
    {
        $kategori = Kategori::all();
        $slug = User::where('name', $slug)->first();
        $artikel = Artikel::where('user_id', $slug->id)->get();
        return view('SportsPedia.author.user', compact('artikel', 'kategori'));
    }
}
