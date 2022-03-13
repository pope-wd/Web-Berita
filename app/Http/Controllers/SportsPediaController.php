<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Artikel;

class SportsPediaController extends Controller
{
    public function index()
    {
        $kategori = Kategori::all();
        $artikel = Artikel::all();
        return view('SportsPedia.home' , [
            'kategori' => $kategori,
            'artikel' => $artikel
        ]);
    }

    public function detail($slug)
    {
        $kategori = Kategori::all();
        $artikel = Artikel::where('slug', $slug)->first();
        $postNew = Artikel::orderBy('kategori_id')->limit(5)->get();

        return view('SportsPedia.artikel.detail' , [
            'kategori' => $kategori,
            'artikel' => $artikel,
            'postNew' => $postNew
        ]);
    }
}
