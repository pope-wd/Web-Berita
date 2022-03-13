<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Materi;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materi = Materi::all();
        return view('admin.materi.index', compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('admin.materi.create', compact('kategori'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul_materi' => 'required|min:4',
        ]);

        $data = $request->all();
        $data['slug'] = Str::slug($request->judul_materi);
        $data['excerpt'] = Str::words($request->body,10);
        $data['user_id'] = 1;
        $data['views'] = 0;
        $data['gambar_materi'] = $request->file('gambar_materi')->store('materi');

        Materi::create($data);

        return redirect()->route('materi.index')->with(['success' => 'Data Berhasil Dibuat']);
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
        $materi = Materi::find($id);
        $kategori = Kategori::all();

        return view('admin.materi.edit', compact('materi', 'kategori'));
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
        if (empty($request->file('gambar_materi'))) {
            
            $materi = Materi::find($id);
            Storage::delete($materi->gambar_materi);
            $materi->update([
                'judul'=> $request->judul_materi,
                'body' => $request->body,
                'slug' => Str::slug($request->judul_materi),
                'excerpt' => Str::words($request->body,10),
                'kategori_id' => $request->kategori_id,
                'user_id' => 1,
                'views' => 0,
            ]);
            return redirect()->route('materi.index')->with(['success'=> 'Data Berhasil diupdate']);
        } else {
            
            $materi = Materi::find($id);
            $materi->update([
                'judul'=> $request->judul_materi,
                'body' => $request->body,
                'slug' => Str::slug($request->judul_materi),
                'excerpt' => Str::words($request->body,10),
                'kategori_id' => $request->kategori_id,
                'user_id' => 1,
                'views' => 0,
                'gambar_materi' => $request->file('gambar_materi')->store('materi'),
            ]);
        return redirect()->route('materi.index')->with(['success'=> 'Data Berhasil diupdate']);
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
        $materi = Materi::find($id);

        Storage::delete($materi->gambar_materi);

        $materi->delete();

        return redirect()->route('materi.index')->with(['success'=> 'Data Berhasil Terhapus']);
    }
}
