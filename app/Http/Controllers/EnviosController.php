<?php

namespace App\Http\Controllers;

use App\Models\Envios;
use Illuminate\Http\Request;

class EnviosController extends Controller
{
    public function index()
    {
        $envios = Envios::all();

        return view('envios.index', compact('envios'));
    }

    public function create()
    {
    
    }

    public function store(Request $request)
    {

    }

    public function edit(Envios $envio)
    {
      
    }

    public function update(Request $request, Envios $envio)
    {
       
    }

    public function destroy(Envios $envio)
    {

    }
}
