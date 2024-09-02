<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Http\Request;

class ClientesController extends Controller
{
    public function index()
    {
       $clientes = Usuarios::where('id_rol', 3)->get();
        
       return view('clientes.index', compact('clientes'));
    }

    public function create()
    {
       return view('clientes.crear');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255',
            'telefono' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'password' => 'required|string|max:255|min:6',
            'id_rol' => 'required|integer'
        ]);

        $data = $request->all();
        $data['password'] = bcrypt($request->password);
        
        Usuarios::create($data);

        return redirect()->route('clientes.index')->with('success', 'Cliente creado exitosamente.');
    }

    public function edit(Usuarios $cliente)
    {
        return view('clientes.editar', compact('cliente'));
    }

    public function update(Request $request, Usuarios $cliente)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255',
            'telefono' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
        ]);

        $cliente->update($request->all());

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    public function destroy(Usuarios $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}