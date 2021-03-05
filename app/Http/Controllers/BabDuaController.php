<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Pengumuman;


class BabDuaController extends Controller
{
     //Soal 5 (Tampilkan Pengumuman yg dibuat oleh user yang membuat galeri dengan nama kategori galeri yang diawali dengan aut)
     public function a5()
     {
         $pengumuman=Pengumuman::whereHas('user',function($query){
             $query->whereHas('galeri',function($query){
                $query->whereHas('kategoriGaleri',function($query){
                 $query->where('nama', 'like', 'Aut%',);
             });
        });
    })->with('user.galeri.kategoriGaleri')->get();
         return $pengumuman;
     }

    //Soal 6 (Tampilkan Pengumuman yg dibuat oleh user yg membuat galeri dan juga membuat berita)
    public function a6()
    {
        $pengumuman=Pengumuman::whereHas('user',function($q){
            $q->whereHas('galeri')->whereHas('berita');
        })->first();
        return $pengumuman;
    }
}
