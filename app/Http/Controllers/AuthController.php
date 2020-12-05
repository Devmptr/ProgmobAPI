<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Admin;

use Validator;

class AuthController extends Controller
{
    //
    public function loginAdmin(Request $request){
        $validator = Validator::make($request->all(), [
            'username' => 'required',
            'password' => 'required',
        ]);

        // Return Response kalau gagal validasi
        if($validator->fails()){
            return response()->json(['error' => $validator->errors()], 401);
        }

        $admin = Admin::where([
            ['username', '=', $request->username],
            ['password', '=', $request->password]
        ])->first();
        
        if(isset($admin)){
            return response()->json(['success' => 'success'], 200);
        }else{
            return response()->json(['error' => 'unauthorized'], 401);
        }
    }
}
