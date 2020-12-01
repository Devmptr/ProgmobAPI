<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::get('loginAdmin', 'AuthController@loginAdmin');

Route::get('getKategoriIuran', 'PembayaranController@getKategoriIuran');

Route::get('getLapak', 'LapakController@allLapak');

Route::post('lapak/search', 'LapakController@searchLapak');

Route::get('lapak/view/{id}', 'LapakController@viewLapak');