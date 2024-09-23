<?php

namespace Tests\Unit;

use App\Models\ClientesEnvios;
use App\Models\Envios;
use App\Models\Usuarios;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClienteEnviosTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function puede_crear_cliente_envio()
    {
        // Crear un usuario (cliente)
        $cliente = Usuarios::factory()->create(['id_rol' => 3]);

        // Crear un envío
        $envio = Envios::factory()->create();

        // Crear la relación cliente_envio
        $clienteEnvio = ClientesEnvios::factory()->create([
            'id_cliente' => $cliente->id,
            'id_envio' => $envio->id,
            'estado' => 'pendiente'
        ]);

        // Verificar que se creó correctamente en la base de datos
        $this->assertDatabaseHas('clientes_envios', [
            'id_cliente' => $clienteEnvio->id_cliente,
            'id_envio' => $clienteEnvio->id_envio,
            'estado' => $clienteEnvio->estado,
        ]);
    }

    /** @test */
    public function puede_actualizar_cliente_envio()
    {
        // Crear un cliente_envio
        $clienteEnvio = ClientesEnvios::factory()->create([
            'estado' => 'pendiente',
        ]);

        // Actualizar el estado
        $clienteEnvio->update([
            'estado' => 'entregado',
        ]);

        // Verificar que el estado fue actualizado en la base de datos
        $this->assertDatabaseHas('clientes_envios', [
            'id' => $clienteEnvio->id,
            'estado' => 'entregado',
        ]);
    }

    /** @test */
    public function puede_eliminar_cliente_envio()
    {
        // Crear un cliente_envio
        $clienteEnvio = ClientesEnvios::factory()->create();

        // Eliminar el cliente_envio
        $clienteEnvio->delete();

        // Verificar que fue eliminado correctamente
        $this->assertDatabaseMissing('clientes_envios', [
            'id' => $clienteEnvio->id,
        ]);
    }
}
