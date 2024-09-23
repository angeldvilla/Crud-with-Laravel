<?php

namespace App\Http\Controllers;

use App\Models\Usuarios;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class AutenticacionController extends Controller
{
   public function showFormLogin()
   {
      return view('auth.login');
   }

   public function showFormRegister()
   {
      return view('auth.registro');
   }

   public function register(Request $request)
   { {
         $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'correo' => 'required|string|email|max:255|unique:usuarios,correo',
            'telefono' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'password' => 'required|string|min:6',
            'id_rol' => 'required|integer',
         ]);

         $data = $request->all();
         $data['password'] = Hash::make($request->password); // Encriptar la contraseña

         Usuarios::create($data); // Crear el usuario

         return redirect()->route('login')->with('success', 'Registro exitoso. Ahora puedes iniciar sesión.');
      }
   }

   public function login(Request $request)
   {
      $credentials = $request->only('correo', 'password');

      if (Auth::attempt($credentials)) {
         $user = Auth::user();

         if ($user->id_rol == 1 || $user->id_rol == 2) {
            return redirect()->route('dashboard')->with('success', 'Sesión iniciada correctamente.');
         } elseif ($user->id_rol == 3) {
            return redirect()->route('home')->with('success', 'Bienvenido a tu área de cliente.');
         }
      }

      return back()->withErrors([
         'correo' => 'Las credenciales no coinciden con nuestros registros.',
      ]);
   }

   public function logout(Request $request)
   {
      Auth::logout();
      return redirect()->route('login')->with('success', 'Has cerrado sesión exitosamente.');
   }
}
