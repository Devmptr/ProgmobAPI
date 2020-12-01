<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\KategoriIuran;

class PembayaranController extends Controller
{
    //
    public function getKategoriIuran(){
        $kategoriIuran = KategoriIuran::all();
        
        return response()->json(['kategoriIuran' => $kategoriIuran ], 200);
    }
}
