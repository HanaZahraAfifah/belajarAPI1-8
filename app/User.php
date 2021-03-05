<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //ARTIKEL
    public function artikel(){
        return $this->hasMany(\App\Artikel::class, 'users_id', 'id');
    }
    public function kategoriArtikel()
    {
        return $this->belongsTo(\App\KategoriArtikel::class, 'users_id', 'id');
    }

    //BERITA
    public function kategoriBerita()
    {
        return $this->belongsTo(\App\KategoriBerita::class, 'users_id','id');
    }
    public function Berita()
    {
        return $this->hasMany(\App\Berita::class, 'users_id','id');
    }

    //PENGUMUMAN
    public function kategoriPengumuman()
    {
        return $this->belongsTo(\App\Pengumuman::class, 'kategori_pengumuman_id','id');
    }
    public function Pengumuman()
    {
        return $this->hasMany(\App\Pengumuman::class, 'kategori_pengumuman_id','id');
    }

    //GALERI
    public function kategoriGaleri()
    {
        return $this->belongsTo(\App\KategoriGaleri::class, 'kategori_galeri_id','id');
    }
    public function Galeri()
    {
        return $this->hasMany(\App\Galeri::class, 'kategori_galeri_id','id');
    }

     /**
     * Get the identifier that will be stored in the subject claim of the JWT.
     *
     * @return mixed
     */
    public function getJWTIdentifier()
    {
        return $this->getKey();
    }

    /**
     * Return a key value array, containing any custom claims to be added to the JWT.
     *
     * @return array
     */
    public function getJWTCustomClaims()
    {
        return [];
    }
}