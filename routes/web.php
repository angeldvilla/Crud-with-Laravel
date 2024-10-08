<?php

use App\Http\Controllers\AutenticacionController;
use App\Http\Controllers\ClientesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EmpleadosController;
use App\Http\Controllers\EnviosController;
use App\Http\Controllers\UsuariosController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('landingPage');
});

//Autenticación
Route::get('registro', [AutenticacionController::class, 'showFormRegister'])->name('registro');
Route::post('registro', [AutenticacionController::class, 'register']);
Route::get('login', [AutenticacionController::class, 'showFormLogin'])->name('login');
Route::post('login', [AutenticacionController::class, 'login']);
Route::post('logout', [AutenticacionController::class, 'logout'])->name('logout');

// Rutas protegidas del dashboard
Route::middleware('auth')->group(function () {

    // Rutas del dashboard disponibles para roles 1 y 2
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('clientes/export-excel', [ClientesController::class, 'exportExcel'])->name('clientes.export-excel');
    Route::get('clientes/export-pdf', [ClientesController::class, 'exportPDF'])->name('clientes.export-pdf');

    Route::resource('dashboard/clientes', ClientesController::class);
    Route::resource('dashboard/empleados', EmpleadosController::class);
    Route::resource('dashboard/envios', EnviosController::class);

    // Rutas del dashboard disponibles para roles 1 
    Route::resource('dashboard/usuarios', UsuariosController::class);


    // Rutas protegidas del cliente
    Route::get('home', [ClientesController::class, 'home'])->name('home');
    Route::get('mis-envios', [ClientesController::class, 'mis_envios'])->name('mis-envios');
});
