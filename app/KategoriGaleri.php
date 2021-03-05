<?php

namespace App;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriGaleri extends Model
{
    protected $table='kategori_galeri';

    protected $fillable=['nama','users_id'];

    public function Galeri()
    {
        return $this->hasMany(\App\Galeri::class, 'kategori_galeri_id','id');
    }

    public function User()
    {
        return $this->belongsTo(\App\User::class, 'users_id', 'id');
    }
}
