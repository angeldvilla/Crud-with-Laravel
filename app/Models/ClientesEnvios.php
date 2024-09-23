<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClientesEnvios extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'id_cliente',
        'id_envio',
        'estado',
    ];
}
