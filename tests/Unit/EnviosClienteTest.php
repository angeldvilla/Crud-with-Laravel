<?php

namespace Tests\Unit;

use App\Models\ClientesEnvios;
use App\Models\Envios;
use App\Models\Roles;
use App\Models\Usuarios;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ClienteEnviosTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Crear roles necesarios
        Roles::factory()->create(['id' => 1, 'rol' => 'Administrador']);
        Roles::factory()->create(['id' => 2, 'rol' => 'Empleado']);
        Roles::factory()->create(['id' => 3, 'rol' => 'Cliente']);
    }

    /** @test */
    public function crear_cliente_envio()
    {
        // Crear un usuario (cliente)
        $cliente = Usuarios::factory()->create(['id_rol' => 3])->id;

        // Crear un envío
        $envio = Envios::factory()->create()->id;

        // Crear la relación cliente_envio
        $clienteEnvio = ClientesEnvios::factory()->create([
            'id_cliente' => $cliente,
            'id_envio' => $envio,
            'estado' => 'pendiente'
        ]);

        // Verificar que se creó correctamente en la base de datos
        $this->assertDatabaseHas('clientes_envios', [
            'id_cliente' => $cliente,
            'id_envio' => $envio,
            'estado' => 'pendiente',
        ]);
    }

    /** @test */
    public function actualizar_cliente_envio()
    {
        // Crear un usuario (cliente)
        $cliente = Usuarios::factory()->create(['id_rol' => 3])->id;

        // Crear un envío
        $envio = Envios::factory()->create()->id;

        // Crear un cliente_envio
        $clienteEnvio = ClientesEnvios::factory()->create([
            'id_cliente' => $cliente,
            'id_envio' => $envio,
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
    public function eliminar_cliente_envio()
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
