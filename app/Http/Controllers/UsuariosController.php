<?php

namespace App\Http\Controllers;

use App\Models\Roles;
use App\Models\Usuarios;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UsuariosController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id_rol == 1;
        $usuarios = Usuarios::all();

        if (Auth::check() && $user) {
            return view('usuarios.index', compact('usuarios'));
        }

        return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tu perfil.');
    }

    public function create()
    {
        $user = Auth::user()->id_rol == 1;
        $roles = Roles::all();

        if (Auth::check() && $user) {
            return view('usuarios.crear', compact('roles'));
        }
        return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tu perfil.');
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

        return redirect()->route('usuarios.index')->with('success', 'Nuevo usuario creado exitosamente.');
    }

    public function edit(Usuarios $usuario)
    {
        $user = Auth::user()->id_rol == 1;
        $roles = Roles::all();

        if (Auth::check() && $user) {
            return view('usuarios.editar', compact('usuario') + ['roles' => $roles]);
        }
        return redirect()->route('login')->with('error', 'Debes iniciar sesión para ver tu perfil.');
    }

    public function update(Request $request, Usuarios $usuario)
    {

        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255',
            'telefono' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
        ]);

        $usuario->update($request->all());

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    public function destroy(Usuarios $usuario)
    {
        $usuario->delete();

        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
