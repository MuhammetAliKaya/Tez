<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('clear', function () {
    return Artisan::call('optimize');
});

Route::get('migrate', function () {
    return Artisan::call('migrate');
});

Route::post('add/data', function (Request $request) {
    $isinsert = false;
    if (isset($request->machine) && isset($request->temparature) && isset($request->humidity)) {
        $isinsert = DB::table('temp_records')->insert(
            [
                'machine' => $request->machine,
                'temparature' => $request->temparature,
                'humidity' => $request->humidity,
                'created_at' => now(),
                'updated_at' => now()

            ]
        );
    }
    return response()->json(['status' => $isinsert]);
});
