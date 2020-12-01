<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lapak extends Model
{
    //
    protected $table = 'lapak';

    protected $fillable = [
        'id_kategori_lapak', 'id_admin', 'nama_lapak', 'nama_pemilik', 'alamat_pemilik', 'foto_pemilik', 
        'posisi_lapak', 'status', 'tanggal_pendaftaran', 'tanggal_akhir_kontrak'
    ];

    public function kategoriLapak(){
        return $this->belongsTo(KategoriLapak::class, 'id_kategori_lapak');
    }

    public function admin(){
        return $this->belongsTo(Admin::class, 'id_admin');
    }
}
