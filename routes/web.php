<?php

use App\Http\Controllers\AutenticacionController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\EnviosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('landingPage');
});

Route::get('login', [AutenticacionController::class, 'index']);
Route::get('registro', [AutenticacionController::class, 'registro']);
Route::resource('clientes', ClientesController::class);
Route::resource('empleados', EmpleadosController::class);
Route::resource('usuarios', UsuariosController::class);
Route::resource('envios', EnviosController::class);


// Rutas del Dashboard
Route::get('dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('dashboard/clientes', [ClientesController::class, 'index']);
Route::get('dashboard/usuarios', [UsuariosController::class, 'index']);
Route::get('dashboard/empleados', [EmpleadosController::class, 'index']);
Route::get('dashboard/envios', [EnviosController::class, 'index']);
