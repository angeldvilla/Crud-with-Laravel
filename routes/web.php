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
Route::get('registro', [AutenticacionController::class, 'registro']);
Route::get('login', [AutenticacionController::class, 'index']);
Route::post('registro', [AutenticacionController::class, 'store'])->name('registro');
Route::post('login', [AutenticacionController::class, 'login'])->name('login');
Route::post('logout', [AutenticacionController::class, 'logout'])->name('logout');
/* Route::get('home', [ClientesController::class, 'home'])->name('home'); */
Route::get('home', [ClientesController::class, 'home'])->middleware('auth')->name('home');


// Rutas del Dashboard
/* Route::get('dashboard', function () {
    return view('dashboard.index');
})->name('dashboard');

Route::get('dashboard/clientes', [ClientesController::class, 'index']);
Route::get('dashboard/usuarios', [UsuariosController::class, 'index']);
Route::get('dashboard/empleados', [EmpleadosController::class, 'index']);
Route::get('dashboard/envios', [EnviosController::class, 'index']); */

// Rutas
/* Route::resource('clientes', ClientesController::class);
    Route::resource('empleados', EmpleadosController::class);
    Route::resource('usuarios', UsuariosController::class);
    Route::resource('envios', EnviosController::class); */

// Rutas protegidas del dashboard
Route::middleware('auth', 'role:1')->group(function () {
    /* Route::get('dashboard', function () {
        return view('dashboard.index');
    })->name('dashboard'); */
    Route::resource('dashboard/usuarios', UsuariosController::class);

    Route::middleware(['auth', 'role:1|2'])->group(function () {
        Route::get('dashboard', function () {
            return view('dashboard.index');
        })->name('dashboard');

        // Rutas del dashboard disponibles para roles 1 y 2
        Route::resource('dashboard/clientes', ClientesController::class);
        Route::resource('dashboard/empleados', EmpleadosController::class);
        Route::resource('dashboard/envios', EnviosController::class);
    });
});
