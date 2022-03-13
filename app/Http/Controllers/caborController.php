<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Artikel;

class caborController extends Controller
{

    public function spesificCabor($slug)
    {
        $slug = Kategori::where('slug', $slug)->first();
        $kategori = Kategori::all();
        $artikel = Artikel::where('kategori_id', $slug->id)->get();
        return view('SportsPedia.cabor.spesific', compact('artikel', 'kategori'));
    }
}
