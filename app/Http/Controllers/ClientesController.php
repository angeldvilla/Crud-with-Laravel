<?php

namespace App\Http\Controllers;

use App\Models\ClientesEnvios;
use App\Models\Envios;
use App\Models\Usuarios;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class ClientesController extends Controller
{

    public function home()
    {
        $user = Auth::user();

        if (Auth::check() && $user->id_rol == 3) {
            return view('clientes.home');
        } else if (Auth::check() && $user->id_rol == 1 || $user->id_rol == 2) {
            return redirect()->route('/');
        } else {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tu perfil.');
        }
    }

    public function mis_envios()
    {
        $user = Auth::user();
        if (Auth::check() && $user->id_rol == 3) {
            $cliente_envio = ClientesEnvios::where('id_cliente', Auth::user()->id)->first();

            if (!$cliente_envio) {
                return redirect()->route('home')->with('error', 'No tienes envíos asociados.');
            }

            $envio = Envios::whereIn('id', $cliente_envio->pluck('id_envio'))->get();

            if ($envio) {
                return view('clientes.misEnvios', compact('envio', 'cliente_envio'));
            }
        } else if (Auth::check() && $user->id_rol == 1 || $user->id_rol == 2) {
            return redirect()->route('/');
        } else {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tu perfil.');
        }
    }



    public function index()
    {
        $user = Auth::user();
        $clientes = Usuarios::where('id_rol', 3)->get();

        if (Auth::check() && $user->id_rol == 1 || $user->id_rol == 2) {
            return view('clientes.index', compact('clientes'));
        } else if (Auth::check() && $user->id_rol == 3) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tu perfil.');
        }
    }

    public function create()
    {
        $user = Auth::user();

        if (Auth::check() && $user->id_rol == 1 || $user->id_rol == 2) {
            return view('clientes.crear');
        } else if (Auth::check() && $user->id_rol == 3) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para crear un cliente.');
        }
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
        $user = Auth::user();

        if (Auth::check() && $user) {
            return view('clientes.editar', compact('cliente'));
        } else if (Auth::check() && $user->id_rol == 3) {
            return redirect()->route('home');
        } else {
            return redirect()->route('login')->with('error', 'Debes iniciar sesión para editar un cliente.');
        }
    }

    public function update(Request $request, Usuarios $cliente)
    {
        $user = Auth::user()->id_rol == 3;

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255',
            'telefono' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
        ]);

        $cliente->update($request->all());

        if (Auth::check() && $user) {
            return redirect()->route('home')->with('success', 'Cliente actualizado exitosamente.');
        }

        return redirect()->route('clientes.index')->with('success', 'Cliente actualizado exitosamente.');
    }

    public function destroy(Usuarios $cliente)
    {
        $cliente->delete();

        return redirect()->route('clientes.index')->with('success', 'Cliente eliminado exitosamente.');
    }
}
