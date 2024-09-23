<?php

namespace Database\Factories;

use App\Models\ClientesEnvios;
use App\Models\Envios;
use App\Models\Usuarios;
use Illuminate\Database\Eloquent\Factories\Factory;

class ClientesEnviosFactory extends Factory
{
    protected $model = ClientesEnvios::class;

    public function definition()
    {
        return [
            'id_cliente' => Usuarios::factory()->create(['id_rol' => 3])->id, // Crear un cliente
            'id_envio' => Envios::factory()->create()->id, // Crear un envío asociado
            'estado' => $this->faker->randomElement(['pendiente', 'en camino', 'entregado']), // Estado del envío
        ];
    }
}
