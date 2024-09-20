<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckActiveSession
{
    public function handle($request, Closure $next)
    {
        if (!Auth::check()) {
            return redirect('login')->with('error', 'Tu sesión ha expirado, por favor inicia sesión de nuevo.');
        }
        
        return $next($request);
    }
}
