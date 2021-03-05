<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group([

    'middleware' => 'api',
    'prefix' => 'auth'

], function ($router) {

    Route::post('login', 'App\Http\Controllers\AuthApiController@login');
    Route::post('logout', 'App\Http\Controllers\AuthApiController@logout');
    Route::post('refresh', 'App\Http\Controllers\AuthApiController@refresh');
    Route::post('me', 'App\Http\Controllers\AuthApiController@me');

});


Route::apiResource('artikel', App\Http\Controllers\ArtikelAPIController::class);
Route::apiResource('kategori_artikel', App\Http\Controllers\KategoriArtikelAPIController::class);

Route::apiResource('berita', App\Http\Controllers\BeritaAPIController::class);
Route::apiResource('kategori_berita', App\Http\Controllers\KategoriBeritaAPIController::class);

Route::apiResource('pengumuman', App\Http\Controllers\PengumumanAPIController::class);
Route::apiResource('kategori_pengumuman', App\Http\Controllers\KategoriPengumumanAPIController::class);

Route::apiResource('galeri', App\Http\Controllers\GaleriAPIController::class);
Route::apiResource('kategori_galeri', App\Http\Controllers\KategoriGaleriAPIController::class);

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


//SOAL-SOAL!
//Tampilkan Artikel dengan id=1 dan users_id=3
Route::get('soal1','App\Http\Controllers\BabSatuController@a1');

//Tampilkan Artikel dengan id=2 atau id=5
Route::get('soal2','App\Http\Controllers\BabSatuController@a2');

//Tampilkan Artikel dengan id=3 dan user dengan nama=Hana
Route::post('soal3','App\Http\Controllers\BabSatuController@a3');

//Tampilkan Pengumuman yg dibuat oleh user yg membuat galeri dengan galeri id=2, sertakan galerinya
Route::post('soal4','App\Http\Controllers\BabSatuController@a4');

//Tampilkan Pengumuman yg dibuat oleh user yang membuat galeri dengan nama kategori galeri yang diawali dengan aut
Route::put('soal5','App\Http\Controllers\BabDuaController@a5');

//Tampilkan Pengumuman yg dibuat oleh user yg membuat galeri dan juga membuat berita
Route::patch('soal6','App\Http\Controllers\BabDuaController@a6');

//Tampilkan Pengumuman yg dibuat oleh user yg membuat dua berita atau lebih
Route::delete('soal7','App\Http\Controllers\BabDuaController@a7');

//Tampilkan user yg membuat berita, artikel, pengumuman dan galeri beserta berita artikel  pengumuman dan galerinya
Route::post('soal8','App\Http\Controllers\BabDuaController@a8');

//Tampilkan jumlah user yang membuat artikel dan pengumuman tapi tidak pernah membuat berita
Route::put('soal9','App\Http\Controllers\BabDuaController@a9');

//Tampilkan yang dibuat oleh user yang membuat galeri dengan nama kategori galeri yg diakhiri dengan et
Route::delete('soal10','App\Http\Controllers\BabDuaController@a10');