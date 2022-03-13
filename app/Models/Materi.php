<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Materi extends Model
{
    use HasFactory;

    protected $table = 'materi';

    protected $fillable = [
        'judul_materi', 'slug', 'kategori_id', 'user_id', 'gambar_materi', 'slide', 'views', 'body', 'excerpt'
    ];

    protected $hidden =[];

    public function kategori(){
        return $this->belongsTo(kategori::class, 'kategori_id', 'id');
    }
    
    //untuk merelasikan artikel pada kategori begitu juga dengan yg bawah ini untuk merelasikan user
    
    public function users(){
        return $this->belongsTo(User::class, 'user_id', 'id');
    }
}
