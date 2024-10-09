<?php

namespace Tests\Feature;

use App\Models\Roles;
use App\Models\Usuarios;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class EmpleadosIntegrationTest extends TestCase
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
    public function test_crear_empleado()
    {
        // Crea un usuario administrador
        $admin = Usuarios::factory()->create(['id_rol' => 1]);
        
        // Autentica como administrador
        $this->actingAs($admin);

        // Envía la solicitud para crear un empleado
        $response = $this->post('/dashboard/empleados', [
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'correo' => 'juan@gmail.com',
            'telefono' => '123456789',
            'direccion' => 'Calle Falsa 123',
            'password' => '123456',
            'id_rol' => 2, // Rol de empleado
        ]);

        // Verifica si la respuesta redirige después de crear el empleado
        $response->assertStatus(302);

        // Verifica si el empleado se ha guardado en la base de datos
        $this->assertDatabaseHas('usuarios', [
            'nombre' => 'Juan',
            'apellido' => 'Pérez',
            'correo' => 'juan@gmail.com',
        ]);
    }

    /** @test */
    public function test_listar_empleados()
    {
        // Autentica como administrador
        $admin = Usuarios::factory()->create(['id_rol' => 1]);
        $this->actingAs($admin);

        // Crea varios empleados
        Usuarios::factory()->count(5)->create(['id_rol' => 2]);

        // Envía la solicitud para listar los empleados
        $response = $this->get('/dashboard/empleados');

        // Verifica que la página de empleados se cargue correctamente
        $response->assertStatus(200);
    }

    /** @test */
    public function test_actualizar_empleado()
    {
        // Autentica como administrador
        $admin = Usuarios::factory()->create(['id_rol' => 1]);
        $this->actingAs($admin);

        // Crea un empleados
        $empleado = Usuarios::factory()->create(['id_rol' => 3]);

        // Envía la solicitud para actualizar el empleado
        $response = $this->put('/dashboard/empleados/' . $empleado->id, [
            'nombre' => 'Carlos',
            'apellido' => 'Sánchez',
        ]);

        // Verifica si la respuesta redirige después de la actualización
        $response->assertStatus(302);
    }

    /** @test */
    public function test_eliminar_empleado()
    {
        // Autentica como administrador
        $admin = Usuarios::factory()->create(['id_rol' => 1]);
        $this->actingAs($admin);

        // Crea un empleado
        $empleados = Usuarios::factory()->create(['id_rol' => 2]);

        // Envía la solicitud para eliminar el empleado
        $response = $this->delete('/dashboard/empleados/' . $empleados->id);

        // Verifica si la respuesta redirige después de la eliminación
        $response->assertStatus(302);

        // Verifica si el empleado ha sido eliminado de la base de datos
        $this->assertDatabaseMissing('usuarios', [
            'id' => $empleados->id,
        ]);
    }
}
