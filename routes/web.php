<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\MateriController;
use App\Http\Controllers\SportsPediaController;
use App\Http\Controllers\caborController;
use App\Http\Controllers\userController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', [SportsPediaController::class, 'index']);

Route::get('/detail/{slug}', [SportsPediaController::class, 'detail'])->name('detail');

Route::get('/cabor/{slug}', [caborController::class, 'spesificCabor'])->name('cabor.spesific');

Route::get('/user/{slug}', [userController::class, 'spesificUser'])->name('author.user');

Route::get('/home', function () {
    return view('template-backend.default');
})->middleware('auth');

Route::resource('kategori', KategoriController::class);

Route::resource('artikel', ArtikelController::class);

Route::resource('materi', MateriController::class);

Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');

Route::get('/register', [RegisterController::class, 'index'])->middleware('guest');

Route::post('/register', [RegisterController::class, 'store']);

Route::post('/login', [LoginController::class, 'authenticate']);

Route::post('/logout', [LoginController::class, 'logout']);