<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriLapak extends Model
{
    //
    protected $table = 'kategori_lapak';

    protected $fillable = [
        'nama_kategori'
    ];

    public function lapak(){
        return $this->hasMany(Lapak::class, 'id_kategori_lapak');
    }
}
