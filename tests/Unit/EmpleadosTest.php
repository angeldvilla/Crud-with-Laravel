<?php

use App\Models\Roles;
use Tests\TestCase;
use App\Models\Usuarios;
use Illuminate\Foundation\Testing\RefreshDatabase;

class EmpleadosTest extends TestCase
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


    public function testVerEmpleados()
    {
        // Crear 5 empleados utilizando el factory
        Usuarios::factory()->count(5)->create(['id_rol' => 2]); 

        // Realizar la petición GET a la ruta de empleados
        $response = $this->get(route('empleados.index'));

        // Asegurarse de que la respuesta sea exitosa y que la vista tenga los datos de empleados
        $response->assertStatus(200);
        $response->assertViewHas('empleados');
    }

    public function testCrearEmpleado()
    {
        $data = [
            'nombre' => 'John',
            'apellido' => 'Doe',
            'correo' => 'john@example.com',
            'telefono' => '1234567890',
            'direccion' => '123 Main St',
            'password' => bcrypt('123456'),
            'id_rol' => 2,
        ];

        // Hacer la petición POST a la ruta para crear un empleado
        $response = $this->post(route('empleados.store'), $data);

        // Asegurarse de que redirige a la página de empleados con un mensaje de éxito
        $response->assertRedirect(route('empleados.index'));
        $response->assertSessionHas('success', 'Empleado creado exitosamente.');

        // Verificar que el empleado fue creado en la base de datos
        $this->assertDatabaseHas('usuarios', [
            'nombre' => 'John',
            'apellido' => 'Doe',
            'correo' => 'john@example.com',
            'telefono' => '1234567890',
            'direccion' => '123 Main St',
            'id_rol' => 2,
        ]);
    }

    public function testActualizarEmpleado()
    {
        // Crear un empleado usando el factory
        $empleado = Usuarios::factory()->create();

        $updatedData = [
            'nombre' => 'Jane',
            'apellido' => 'Doe',
            'correo' => 'jane@example.com',
            'telefono' => '9876543210',
            'direccion' => '456 Main St',
        ];

        // Hacer la petición PUT para actualizar el empleado
        $response = $this->put(route('empleados.update', $empleado->id), $updatedData);

        // Asegurarse de que redirige a la página de empleados con un mensaje de éxito
        $response->assertRedirect(route('empleados.index'));
        $response->assertSessionHas('success', 'Empleado actualizado exitosamente.');

        // Verificar que los datos del empleado fueron actualizados en la base de datos
        $this->assertDatabaseHas('usuarios', [
            'id' => $empleado->id,
            'nombre' => 'Jane',
            'apellido' => 'Doe',
            'correo' => 'jane@example.com',
            'telefono' => '9876543210',
            'direccion' => '456 Main St',
        ]);
    }

    public function testEliminarEmpleado()
    {
        // Crear un empleado usando el factory
        $empleado = Usuarios::factory()->create();

        // Hacer la petición DELETE para eliminar el empleado
        $response = $this->delete(route('empleados.destroy', $empleado->id));

        // Asegurarse de que redirige a la página de empleados con un mensaje de éxito
        $response->assertRedirect(route('empleados.index'));
        $response->assertSessionHas('success', 'Empleado eliminado exitosamente.');

        // Verificar que el empleado fue eliminado de la base de datos
        $this->assertDatabaseMissing('usuarios', [
            'id' => $empleado->id
        ]);
    }
}