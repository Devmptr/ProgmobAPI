<?php

namespace App\Http\Controllers;

use App\PembayaranIuran;
use Illuminate\Http\Request;

use App\KategoriIuran;

class PembayaranController extends Controller
{
    //
    public function getKategoriIuran(){
        $kategoriIuran = KategoriIuran::all();

        return response()->json(['kategoriIuran' => $kategoriIuran ], 200);
    }

    public function getDataKategori(Request $request){
        $dataKategoriIuran = KategoriIuran::where('nama_kategori_iuran',$request->nama_kategori_iuran)->first();

        return response()->json($dataKategoriIuran,200);
    }

    public function bayarIuran(Request $request){
        $kategoriiuran = KategoriIuran::where('id_kategori_iuran',$request->id_kategori_iuran)->first();
        $bayar = PembayaranIuran::create([
            'id_lapak'=>$request->id_lapak,
            'tanggal_bayar'=>$request->tanggal_bayar,
            'tanggal_iuran'=>$request->tanggal_iuran,
            'periode_iuran'=>$request->periode_iuran,
            'id_kategori_iuran'=>$request->id_kategori_iuran,
            'nilai'=>$request->periode_iuran*$kategoriiuran->nilai,
            'id_pegawai'=>$request->id_pegawai,
            'id_manager'=>0,
            'tanggal_penyerahan' => now()
        ]);
        return response()->json(["message"=>"success"],200);
    }
}
