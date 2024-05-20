<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CamionController;
use App\Http\Controllers\CamioneroController;
use App\Http\Controllers\PaqueteController;

Route::get('/', function () {
    return view('welcome');
});

//route
Route::resource('camionero', CamioneroController::class);
Route::resource('camion', CamionController::class);
Route::resource('paquetes', PaqueteController::class);
