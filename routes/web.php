<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    Artisan::call('migrate');
    Artisan::call('optimize');
    $data = DB::table('temp_records')->orderBy('created_at', 'DESC')->limit(10)->get()->toArray();
    return view('welcome', compact('data'));
});
