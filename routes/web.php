<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BarangController;


Route::get('/', function () {
    return view('layouts/app');
});

// 
Route::resource('barang', BarangController::class);


