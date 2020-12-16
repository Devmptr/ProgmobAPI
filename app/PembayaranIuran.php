<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PembayaranIuran extends Model
{
    //
    public $timestamps = false;

    protected $table = 'pembayaran_iuran';

    protected $fillable = [
        'id_lapak', 'id_kategori_iuran', 'id_pegawai', 'id_manager',
        'tanggal_bayar', 'tanggal_iuran', 'periode_iuran',  'nilai', 'tanggal_penyerahan'
    ];

    public function lapak(){
        return $this->belongsTo(Lapak::class, 'id_lapak');
    }

    public function kategoriIuran(){
        return $this->belongsTo(kategoriIuran::class, 'id_kategori_iuran');
    }

    public function pegawai(){
        return $this->belongsTo(Pegawai::class, 'id_pegawai');
    }

    public function manager(){
        return $this->belongsTo(Pegawai::class, 'id_manager');
    }
}
