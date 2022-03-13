<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;



class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Artikel::all();

        return view('admin.artikel.index', [
            'artikel' => $artikel
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.artikel.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul'=> 'required|min:4',
        ]);

        $data = $request->all();

        $data['slug'] = Str::slug($request->judul);
        $data['excerpt'] = Str::words();
        $data['user_id'] = 1;
        $data['views'] = 0;
        $data['gambar_artikel'] = $request->file('gambar_artikel')->store('artikel');

        Artikel::create($data);

        return redirect()->route('artikel.index')->with(['success'=> 'Data Berhasil Tersimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel = Artikel::find($id);
        $kategori = Kategori::all();

        return view('admin.artikel.edit', [
            'artikel' => $artikel,
            'kategori' => $kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // $this->validate($request,[
        //     'judul'=> 'required|min:4',
        // ]);

        if (empty($request->file('gambar_artikel'))) {
            
            $artikel = Artikel::find($id);
            Storage::delete($artikel->gambar_artikel);
            $artikel->update([
                'judul'=> $request->judul,
                'body' => $request->body,
                'slug' => Str::slug($request->judul),
                'excerpt' => Str::words($request->body,10),
                'kategori_id' => $request->kategori_id,
                'slide' => $request->slide,
                'user_id' => 1,
                'views' => 0,
            ]);
            return redirect()->route('artikel.index')->with(['success'=> 'Data Berhasil diupdate']);
        } else {
            
            $artikel = Artikel::find($id);
            $artikel->update([
                'judul'=> $request->judul,
                'body' => $request->body,
                'slug' => Str::slug($request->judul),
                'excerpt' => Str::words($request->body,10),
                'kategori_id' => $request->kategori_id,
                'slide' => $request->slide,
                'user_id' => 1,
                'views' => 0,
                'gambar_artikel' => $request->file('gambar_artikel')->store('artikel'),
            ]);
        return redirect()->route('artikel.index')->with(['success'=> 'Data Berhasil diupdate']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::find($id);

        Storage::delete($artikel->gambar_artikel);

        $artikel->delete();

        return redirect()->route('artikel.index')->with(['success'=> 'Data Berhasil Terhapus']);
    }
}
