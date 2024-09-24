<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Las políticas de acceso para los modelos.
     */

    /**
     * Registra cualquier servicio de autenticación o autorización.
     */
    public function boot()
    {
        $this->registerPolicies(); // Registro de las políticas

        Gate::define('ver-envios', function ($user) {
            dd($user->id_rol);
            if ($user->id_rol = 1 || $user->id_rol = 2) {
                return true;
            }
            return false;
        });

        Gate::define('ver-clientes', function ($user) {

            if ($user->id_rol = 1 || $user->id_rol = 2) {
                return true;
            }
            return false;
        });

        Gate::define('ver-empleados', function ($user) {
            if ($user->id_rol = 1 || $user->id_rol = 2) {
                return true;
            }
            return false;
        });

        Gate::define('ver-usuarios', function ($user) {
            if ($user->id_rol = 1) {
                return true;
            }
            return false;
        });
    }
}
