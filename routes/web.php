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


// Rutas del Dashboard
Route::get('/dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('admin/clientes', [ClientesController::class, 'index']);
/* Route::get('admin/envios', [EnviosController::class, 'index']);
Route::get('admin/usuarios', [UsuariosController::class, 'index']);
Route::get('admin/empleados', [EmpleadosController::class, 'index']); */

