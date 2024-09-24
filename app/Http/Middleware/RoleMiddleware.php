<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        // Verifica si el usuario tiene el rol
        foreach ($roles as $role) {
            if ($user->id_rol == $role) {
                return $next($request);
            }
        }

        // Redirige si el usuario no tiene acceso
        return redirect('/')->with('error', 'Acceso denegado');
    }
}
