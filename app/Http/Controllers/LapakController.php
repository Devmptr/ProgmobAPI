<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Lapak;

class LapakController extends Controller
{
    //
    public function allLapak(){
        $lapak = Lapak::all();
        
        return response()->json(['lapak' => $lapak ], 200);
    }

    public function searchLapak(Request $request){
        $validator = Validator::make($request->all(), [
            'search' => 'required',
        ]);

        // Return Response kalau gagal validasi
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }

        $lapak = Lapak::where('nama_lapak', 'LIKE', '%'.$request->search.'%')->get();

        if(count($lapak) > 0){
            return response()->json([
                'success' => 'success',
                'lapak' => $lapak
            ], 200);
        }else{
            return response()->json([
                'error' => 'Lapak Not Found'
            ], 404);
        }
    }

    public function viewLapak($id){
        $lapak = Lapak::find($id);

        if(isset($lapak)){
            return response()->json([
                'success' => 'success',
                'lapak' => $lapak
            ], 200);
        }else{
            return response()->json([
                'error' => 'Lapak Not Found'
            ], 404);
        }
    }
}
