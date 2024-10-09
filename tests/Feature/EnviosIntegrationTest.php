<?php

namespace Tests\Feature;

use App\Models\Envios;
use App\Models\Roles;
use App\Models\Usuarios;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
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
    public function test_crear_envio()
    {
        // Crea un usuario administrador
        $admin = Usuarios::factory()->create(['id_rol' => 1]);
        
        // Autentica como administrador
        $this->actingAs($admin);

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

        // Verifica si la respuesta redirige después de crear el envio
        $response->assertStatus(302);
    }

    /** @test */
    public function test_listar_envios()
    {
        // Autentica como administrador
        $admin = Usuarios::factory()->create(['id_rol' => 1]);
        $this->actingAs($admin);

        // Crea varios envios
        Envios::factory()->count(5)->create();

        // Envía la solicitud para listar los envios
        $response = $this->get('/dashboard/envios');

        // Verifica que la página de envios se cargue correctamente
        $response->assertStatus(200);
    }

    /** @test */
    public function test_actualizar_envio()
    {
        // Autentica como administrador
        $admin = Usuarios::factory()->create(['id_rol' => 1]);
        $this->actingAs($admin);

        // Crea un envio
        $envio = Envios::factory()->create();

        // Envía la solicitud para actualizar el envio
        $response = $this->put('/dashboard/envios/' . $envio->id, [
            'origen' => 'Cartago',
            'destinatario' => 'Bucaramanga',
        ]);

        // Verifica si la respuesta redirige después de la actualización
        $response->assertStatus(302);
    }

    /** @test */
    public function test_eliminar_envio()
    {
        // Autentica como administrador
        $admin = Usuarios::factory()->create(['id_rol' => 1]);
        $this->actingAs($admin);

        // Crea un envio
        $envio = Envios::factory()->create();

        // Envía la solicitud para eliminar el envios
        $response = $this->delete('/dashboard/envios/' . $envio->id);

        // Verifica si la respuesta redirige después de la eliminación
        $response->assertStatus(302);

        // Verifica si el empleado ha sido eliminado de la base de datos
        $this->assertDatabaseMissing('envios', [
            'id' => $envio->id,
        ]);
    }
}
