<?php

namespace App\Providers;

use App\Models\Usuarios;
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

        Gate::define('view-dashboard', function ($user) {
            return $user->id_rol == 1 || $user->id_rol == 2;
        });

        Gate::define('delete-usuarios', function (Usuarios $user) {
            return $user->id_rol == 1;
        });

        Gate::define('delete-empleados', function (Usuarios $user) {
            return $user->id_rol == 1;
        });
    }
}
