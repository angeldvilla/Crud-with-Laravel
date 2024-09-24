<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Str;

class Usuarios extends Authenticatable
{
    use HasFactory;

    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'id',
        'nombre',
        'apellido',
        'correo',
        'telefono',
        'direccion',
        'password',
        'id_rol',
    ];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            if (empty($model->id)) {
                $model->id = (string) Str::uuid();
            }
        });
    }

    public function esCliente()
    {
        return $this->id_rol === 3; // 3 para clientes
    }

    public function esEmpleado()
    {
        return $this->id_rol === 2; // 2 para empleados
    }

    public function esAdmin()
    {
        return $this->id_rol === 1; // 1 para administradores
    }
}
