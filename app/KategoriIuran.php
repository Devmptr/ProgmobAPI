<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class KategoriIuran extends Model
{
    //
    protected $table = 'kategori_iuran';

    protected $fillable = [
        'nama_kategori_iuran', 'nilai', 'status'
    ];

    public function pembayaranIuran(){
        return $this->hasMany(PembayaranIuran::class, 'id_kategori_iuran');
    }
}
