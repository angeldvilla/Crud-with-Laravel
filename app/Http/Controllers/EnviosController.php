<?php

namespace App\Http\Controllers;

use App\Models\ClientesEnvios;
use App\Models\Envios;
use App\Models\Usuarios;
use Illuminate\Http\Request;

class EnviosController extends Controller
{
    public function index()
    {
        $envios = Envios::all();

        return view('envios.index', compact('envios'));
    }

    public function show(Envios $envio)
    {
        $clienteEnvio = ClientesEnvios::where('id_envio', $envio->id)->first();
        $cliente = Usuarios::where('id', $clienteEnvio->id_cliente)->first();
        return view('envios.detalle', compact('envio', 'clienteEnvio', 'cliente'));
    }

    public function create()
    {
        $clientes = Usuarios::where('id_rol', 3)->get();
        return view('envios.crear', compact('clientes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'origen' => 'required',
            'destinatario' => 'required',
            'peso' => 'required',
            'alto' => 'required',
            'ancho' => 'required',
            'profundidad' => 'required',
            'volumen' => 'required',
            'costo' => 'required',
            'descripcion' => 'required',
            'id_cliente' => 'required|exists:usuarios,id'
        ]);

        $envio = Envios::create($request->all());

        ClientesEnvios::create([
            'id_cliente' => $request->id_cliente,
            'id_envio' => $envio->id,
            'estado' => 'pendiente'
        ]);

        return redirect()->route('envios.index')->with('success', 'Envío creado exitosamente');
    }

    public function edit(Envios $envio)
    {
        $cliente = Usuarios::where('id_rol', 3)->get();
        $clienteEnvio = ClientesEnvios::where('id_envio', $envio->id)->first();

        if (!$clienteEnvio) {
            return redirect()->route('envios.index')->with('error', 'Cliente no encontrado para este envío.');
        }

        $id_cliente = $clienteEnvio->id_cliente;
        $estado = $clienteEnvio->estado;

        return view('envios.editar', compact('envio', 'cliente', 'id_cliente', 'estado'));
    }

    public function update(Request $request, Envios $envio)
    {
        $request->validate([
            'origen' => 'required',
            'destinatario' => 'required',
            'peso' => 'required',
            'alto' => 'required',
            'ancho' => 'required',
            'profundidad' => 'required',
            'volumen' => 'required',
            'costo' => 'required',
            'descripcion' => 'required',
            'id_cliente' => 'required|exists:usuarios,id'
        ]);

        $envio->update($request->all());

        ClientesEnvios::where('id_envio', $envio->id)->update([
            'id_cliente' => $request->id_cliente,
            'estado' => $request->estado
        ]);

        return redirect()->route('envios.index')->with('success', 'Envío actualizado exitosamente');
    }

    public function destroy(Envios $envio)
    {
        $envio->delete();
        return redirect()->route('envios.index')->with('success', 'Envío eliminado exitosamente');
    }

    public function detail(Envios $envio)
    {
        $clienteEnvio = ClientesEnvios::where('id_envio', $envio->id)->first();
        return view('envios.detalle', compact('envio', 'clienteEnvio'));
    }
}
