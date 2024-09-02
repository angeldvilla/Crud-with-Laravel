<?php

use App\Http\Controllers\AutenticacionController;
use App\Http\Controllers\ClientesController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingPage');
});

Route::get('/login', [AutenticacionController::class, 'index']);
Route::get('/registro', [AutenticacionController::class, 'registro']);
Route::resource('clientes', ClientesController::class);
