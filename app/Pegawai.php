<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    //
    protected $table = 'pegawai';

    protected $fillable = [
        'nama_pegawai', 'alamat', 'foto'
    ];

    public function admin(){
        return $this->belongsTo(Admin::class, 'id_pegawai');
    }

    public function pembayaranIuran(){
        return $this->hasMany(PembayaranIuran::class, 'id_pegawai');
    }
}
