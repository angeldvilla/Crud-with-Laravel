<?php

namespace Tests\Unit;

use App\Models\Envios;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EnviosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function crear_envio()
    {
        // Utilizando el factory para crear un envío
        $envio = Envios::factory()->create();

        // Verificar que el envío fue creado y los datos son correctos
        $this->assertDatabaseHas('envios', [
            'id' => $envio->id,
            'origen' => $envio->origen,
            'destinatario' => $envio->destinatario,
        ]);
    }

    /** @test */
    public function actualizar_envio()
    {
        // Crear un envío
        $envio = Envios::factory()->create();

        // Actualizar algunos campos del envío
        $envio->update([
            'origen' => 'Cartago',
            'destinatario' => 'Cartagena',
        ]);

        // Verificar que el campo fue actualizado en la base de datos
        $this->assertDatabaseHas('envios', [
            'id' => $envio->id,
            'origen' => 'Cartago',
            'destinatario' => 'Cartagena',
        ]);
    }

    /** @test */
    public function eliminar_envio()
    {
        // Crear un envío
        $envio = Envios::factory()->create();

        // Eliminar el envío
        $envio->delete();

        // Verificar que el envío ya no existe en la base de datos
        $this->assertDatabaseMissing('envios', [
            'id' => $envio->id,
        ]);
    }
}
