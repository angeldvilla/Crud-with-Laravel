<?php

namespace App\Http\Controllers;

use App\Models\ClientesEnvios;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientesEnvioController extends Controller
{

    public function index()
    {
        $user = Auth::user();

        if (Auth::check() && $user) {
            return view('envios.detalle', compact('clienteEnvio'));
        }
        return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tu perfil.');
    }


    public function store() {}

    public function update() {}

    public function destroy() {}
}
