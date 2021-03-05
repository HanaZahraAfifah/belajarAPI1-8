<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artikel;
use App\Pengumuman;


class BabSatuController extends Controller
{
    //Soal 1 (Tampilkan Artikel dengan id=1 dan users_id=3)
    public function a1()
    {
       $artikel=Artikel::where('id',1)->where('users_id',3)->get();

       return $artikel;
    }

    //Soal 2 (Tampilkan Artikel dengan id=2 atau id=5)
    public function a2()
    {
        $artikel=Artikel::where('id',2)->orWhere('id',5)->get();

        return $artikel;
    }

    //Soal 3 (Tampilkan Artikel dengan id=3 dan user dengan nama=Hana)
    public function a3()
    {
        $artikel=Artikel::where('id',3)->whereHas('user',function($query){
            $query->where('name','Hana');
        })->with('user')->get();
        return $artikel;
    }

    //Soal 4 (Tampilkan Pengumuman yg dibuat oleh user yg membuat galeri dengan galeri id=2, sertakan galerinya)
    public function a4()
    {
        $pengumuman=Pengumuman::whereHas('user',function($query){
            $query->whereHas('galeri',function($query){
                $query->where('id',2);
            });
        })->with('user.galeri')->get();
        return $pengumuman;
    }
}
