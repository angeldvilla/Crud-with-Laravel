<?php

namespace Database\Seeders;

use App\Models\ClientesEnvios;
use Illuminate\Database\Seeder;

class ClientesEnviosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Crear 10 relaciones cliente-envío
        ClientesEnvios::factory()->count(10)->create();
    }
}
