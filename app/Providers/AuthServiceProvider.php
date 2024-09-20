<?php

namespace App\Providers;

use App\Models\Usuarios;
use App\Policies\EmpleadoPolicy;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;

class AuthServiceProvider extends ServiceProvider
{
    /**
     * Las políticas de acceso para los modelos.
     */
    protected $policies = [
        Usuarios::class => EmpleadoPolicy::class,
    ];

    /**
     * Registra cualquier servicio de autenticación o autorización.
     */
    public function boot()
    {
        $this->registerPolicies(); // Registro de las políticas
    }
}
