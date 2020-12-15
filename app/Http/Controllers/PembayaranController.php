<?php

namespace App\Http\Controllers;

use App\PembayaranIuran;
use Illuminate\Http\Request;

use App\KategoriIuran;

use Validator;

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

        $validator = Validator::make($request->all(), [
            'id_lapak' => 'required',
            'tanggal_bayar' => 'required',
            'tanggal_iuran' => 'required',
            'periode_iuran' => 'required',
            'id_kategori_iuran' => 'required',
            'id_pegawai' => 'required',
        ]);

        // Return Response kalau gagal validasi
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }

        $bayar = PembayaranIuran::create([
            'id_lapak'=>$request->id_lapak,
            'tanggal_bayar'=>$request->tanggal_bayar,
            'tanggal_iuran'=>$request->tanggal_iuran,
            'periode_iuran'=>$request->periode_iuran,
            'id_kategori_iuran'=>$request->id_kategori_iuran,
            'nilai'=>$request->periode_iuran*$kategoriiuran->nilai,
            'id_pegawai'=>$request->id_pegawai,
        ]);
        return response()->json(["message"=>"success"],200);
    }
}
