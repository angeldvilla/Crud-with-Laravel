<?php

namespace Tests\Feature;

use App\Models\ClientesEnvios;
use App\Models\Envios;
use App\Models\Roles;
use App\Models\Usuarios;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EnviosIntegrationTest extends TestCase
{
    use RefreshDatabase;

    // Este método configura los roles antes de ejecutar cada prueba
    protected function setUp(): void
    {
        parent::setUp();

        // Crear roles necesarios
        Roles::factory()->create(['id' => 1, 'rol' => 'Administrador']);
        Roles::factory()->create(['id' => 2, 'rol' => 'Empleado']);
        Roles::factory()->create(['id' => 3, 'rol' => 'Cliente']);
    }

    /** @test */
    public function test_crear_cliente_envio()
    {
        // Crea un usuario administrador
        $admin = Usuarios::factory()->create(['id_rol' => 1]);
        
        // Autentica como administrador
        $this->actingAs($admin);

        // Crear un usuario (cliente)
        $cliente = Usuarios::factory()->create(['id_rol' => 3])->id;

        // Envía la solicitud para crear un envio
        $response = $this->post('/dashboard/envios', [
            'origen' => 'Cartagucho',
            'destinatario' => 'Bucaramangoso',
            'peso' => 88,
            'alto' => 8,
            'ancho' => 29,
            'profundidad' => 45,
            'volumen' => 624.51, 
            'costo' => 18611239, 
            'descripcion' => 'Blanditiis aliquam aliquam beatae deserunt quibusdam. Adipisci est quaerat facilis voluptate culpa.', 
        ]);

        $envioId = json_decode($response->getContent())->id; 
        
        // Crear entrada en clientes_envios
        ClientesEnvios::factory()->create([
            'id_cliente' => $cliente,
            'id_envio' => $envioId,
            'estado' => 'pendiente'
        ]);
        
        // Verificar que se creó correctamente en la base de datos
        $this->assertDatabaseHas('clientes_envios', [
            'id_cliente' => $cliente,
            'id_envio' => $envioId,
            'estado' => 'pendiente',
        ]);

        // Verificar que la respuesta sea exitosa
        $response->assertStatus(302);
    }

    /** @test */
    public function test_actualizar_detalle_envio()
    {
        // Autentica como administrador
        $admin = Usuarios::factory()->create(['id_rol' => 1]);
        $this->actingAs($admin);

        // Crear un usuario (cliente)
        $cliente = Usuarios::factory()->create(['id_rol' => 3])->id;

        // Envía la solicitud para crear un envio
        $response = $this->post('/dashboard/envios', [
            'origen' => 'Cartagucho',
            'destinatario' => 'Bucaramangoso',
            'peso' => 88,
            'alto' => 8,
            'ancho' => 29,
            'profundidad' => 45,
            'volumen' => 624.51, 
            'costo' => 18611239, 
            'descripcion' => 'Blanditiis aliquam aliquam beatae deserunt quibusdam. Adipisci est quaerat facilis voluptate culpa.', 
        ]);

        $envioId = json_decode($response->getContent())->id; 
        
        $clienteEnvio = ClientesEnvios::factory()->create([
            'id_cliente' => $cliente,
            'id_envio' => $envioId,
            'estado' => 'pendiente'
        ]);
        
        // Envía la solicitud para actualizar el envio
        $response = $this->put('/dashboard/envios/' . $clienteEnvio->id, [
            'estado' => 'entregado',
        ]);

        $response->assertStatus(302); 
    }

    /** @test */
    public function test_eliminar_cliente_envio()
    {
        // Autentica como administrador
        $admin = Usuarios::factory()->create(['id_rol' => 1]);
        $this->actingAs($admin);

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
