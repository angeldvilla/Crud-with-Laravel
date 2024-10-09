<?php

namespace Tests\Feature;

use App\Models\Roles;
use App\Models\Usuarios;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class ClientesIntegrationTest extends TestCase
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
    public function test_crear_cliente()
    {
        // Crea un usuario administrador
        $admin = Usuarios::factory()->create(['id_rol' => 1]);
        
        // Autentica como administrador
        $this->actingAs($admin);

        // Envía la solicitud para crear un cliente
        $response = $this->post('/dashboard/clientes', [
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'correo' => 'juan@gmail.com',
            'telefono' => '123456789',
            'direccion' => 'Calle Falsa 123',
            'password' => '123456',  // No necesitas `Hash::make` aquí, Laravel lo maneja internamente
            'id_rol' => 3, // Rol de cliente
        ]);

        // Verifica si la respuesta redirige después de crear el cliente
        $response->assertStatus(302);

        // Verifica si el cliente se ha guardado en la base de datos
        $this->assertDatabaseHas('usuarios', [
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'correo' => 'juan@gmail.com',
        ]);
    }

    /** @test */
    public function test_listar_clientes()
    {
        // Autentica como administrador
        $admin = Usuarios::factory()->create(['id_rol' => 1]);
        $this->actingAs($admin);

        // Crea varios clientes
        Usuarios::factory()->count(5)->create(['id_rol' => 3]);

        // Envía la solicitud para listar los clientes
        $response = $this->get('/dashboard/clientes');

        // Verifica que la página de clientes se cargue correctamente
        $response->assertStatus(200);
    }

    /** @test */
    public function test_actualizar_cliente()
    {
        // Autentica como administrador
        $admin = Usuarios::factory()->create(['id_rol' => 1]);
        $this->actingAs($admin);

        // Crea un cliente
        $cliente = Usuarios::factory()->create(['id_rol' => 3]);

        // Envía la solicitud para actualizar el cliente
        $response = $this->put('/dashboard/clientes/' . $cliente->id, [
            'nombre' => 'Carlos',
            'apellido' => 'Sánchez',
        ]);

        // Verifica si la respuesta redirige después de la actualización
        $response->assertStatus(302);
    }

    /** @test */
    public function test_eliminar_cliente()
    {
        // Autentica como administrador
        $admin = Usuarios::factory()->create(['id_rol' => 1]);
        $this->actingAs($admin);

        // Crea un cliente
        $cliente = Usuarios::factory()->create(['id_rol' => 3]);

        // Envía la solicitud para eliminar el cliente
        $response = $this->delete('/dashboard/clientes/' . $cliente->id);

        // Verifica si la respuesta redirige después de la eliminación
        $response->assertStatus(302);

        // Verifica si el cliente ha sido eliminado de la base de datos
        $this->assertDatabaseMissing('usuarios', [
            'id' => $cliente->id,
        ]);
    }
}
