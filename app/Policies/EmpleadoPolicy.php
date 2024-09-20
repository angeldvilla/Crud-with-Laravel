<?php

namespace App\Policies;

use App\Models\Usuarios; 
use Illuminate\Auth\Access\HandlesAuthorization;

class EmpleadoPolicy
{
    use HandlesAuthorization;

    /**
     * Determina si el usuario puede eliminar un empleado.
     */
    public function delete(Usuarios $user)
    {
        return $user->role_id === 1; // Solo los administradores (role_id = 1) pueden eliminar empleados
    }
}
