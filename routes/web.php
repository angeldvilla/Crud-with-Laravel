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

//Autenticación
Route::get('registro', [AutenticacionController::class, 'showFormRegister'])->name('registro');
Route::post('registro', [AutenticacionController::class, 'registro']);
Route::get('login', [AutenticacionController::class, 'showFormLogin'])->name('login');
Route::post('login', [AutenticacionController::class, 'login']);
Route::post('logout', [AutenticacionController::class, 'logout'])->name('logout');

// Rutas protegidas del dashboard
Route::middleware('auth')->group(function () {
    Route::resource('dashboard/usuarios', UsuariosController::class);

    Route::middleware('auth')->group(function () {
        Route::get('dashboard', function () {
            return view('dashboard.index');
        })->name('dashboard');

        // Rutas del dashboard disponibles para roles 1 y 2
        Route::resource('dashboard/clientes', ClientesController::class);
        Route::resource('dashboard/empleados', EmpleadosController::class);
        Route::resource('dashboard/envios', EnviosController::class);
    });
});

// Rutas protegidas del cliente
Route::middleware('auth')->group(function () {
    Route::get('home', [ClientesController::class, 'home'])->name('home');
});
