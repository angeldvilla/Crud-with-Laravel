<?php

namespace Database\Factories;

use App\Models\Envios;
use Illuminate\Database\Eloquent\Factories\Factory;

class EnviosFactory extends Factory
{
    protected $model = Envios::class;

    public function definition()
    {
        return [
            'origen' => $this->faker->address,
            'destinatario' => $this->faker->address,
            'peso' => (string) $this->faker->numberBetween(1, 100), // Peso como string
            'alto' => (string) $this->faker->numberBetween(1, 100), // Alto como string
            'ancho' => (string) $this->faker->numberBetween(1, 100), // Ancho como string
            'profundidad' => (string) $this->faker->numberBetween(1, 100), // Profundidad como string
            'volumen' => $this->faker->randomFloat(2, 1, 1000), // Volumen como decimal
            'costo' => (string) $this->faker->numberBetween(50000, 20000000), // Costo como string
            'descripcion' => $this->faker->paragraph,
        ];
    }
}
