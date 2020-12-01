<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //
    protected $table = 'admin';

    protected $fillable = [
        'id_pegawai', 'username', 'password', 'role', 'status'
    ];

    public function pegawai(){
        return $this->hasOne(Pegawai::class, 'id_pegawai');
    }

    public function lapak(){
        return $this->hasMany(Lapak::class, 'id_admin');
    }
}
