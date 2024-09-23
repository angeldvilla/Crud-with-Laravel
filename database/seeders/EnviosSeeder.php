<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Envios;

class EnviosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear 10 envíos
        Envios::factory()->count(10)->create();
    }
}
