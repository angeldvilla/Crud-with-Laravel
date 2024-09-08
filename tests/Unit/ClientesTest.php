<?php

use App\Models\Roles;
use Tests\TestCase;
use App\Models\Usuarios;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ClientesTest extends TestCase
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


    public function testVerClientes()
    {
        // Crear 3 clientes utilizando el factory
        Usuarios::factory()->count(3)->create(['id_rol' => 3]); 

        // Realizar la petición GET a la ruta de clientes
        $response = $this->get(route('clientes.index'));

        // Asegurarse de que la respuesta sea exitosa y que la vista tenga los datos de clientes
        $response->assertStatus(200);
        $response->assertViewHas('clientes');
    }

    public function testCrearCliente()
    {
        $data = [
            'nombre' => 'John',
            'apellido' => 'Doe',
            'correo' => 'john@example.com',
            'telefono' => '1234567890',
            'direccion' => '123 Main St',
            'password' => bcrypt('123456'),
            'id_rol' => 3,
        ];

        // Hacer la petición POST a la ruta para crear un cliente
        $response = $this->post(route('clientes.store'), $data);

        // Asegurarse de que redirige a la página de clientes con un mensaje de éxito
        $response->assertRedirect(route('clientes.index'));
        $response->assertSessionHas('success', 'Cliente creado exitosamente.');

        // Verificar que el cliente fue creado en la base de datos
        $this->assertDatabaseHas('usuarios', [
            'nombre' => 'John',
            'apellido' => 'Doe',
            'correo' => 'john@example.com',
            'telefono' => '1234567890',
            'direccion' => '123 Main St',
            'id_rol' => 3,
        ]);
    }

    public function testActualizarCliente()
    {
        // Crear un cliente usando el factory
        $cliente = Usuarios::factory()->create();

        $updatedData = [
            'nombre' => 'Jane',
            'apellido' => 'Doe',
            'correo' => 'jane@example.com',
            'telefono' => '9876543210',
            'direccion' => '456 Main St',
        ];

        // Hacer la petición PUT para actualizar el cliente
        $response = $this->put(route('clientes.update', $cliente->id), $updatedData);

        // Asegurarse de que redirige a la página de clientes con un mensaje de éxito
        $response->assertRedirect(route('clientes.index'));
        $response->assertSessionHas('success', 'Cliente actualizado exitosamente.');

        // Verificar que los datos del cliente fueron actualizados en la base de datos
        $this->assertDatabaseHas('usuarios', [
            'id' => $cliente->id,
            'nombre' => 'Jane',
            'apellido' => 'Doe',
            'correo' => 'jane@example.com',
            'telefono' => '9876543210',
            'direccion' => '456 Main St',
        ]);
    }

    public function testEliminarCliente()
    {
        // Crear un cliente usando el factory
        $cliente = Usuarios::factory()->create();

        // Hacer la petición DELETE para eliminar el cliente
        $response = $this->delete(route('clientes.destroy', $cliente->id));

        // Asegurarse de que redirige a la página de clientes con un mensaje de éxito
        $response->assertRedirect(route('clientes.index'));
        $response->assertSessionHas('success', 'Cliente eliminado exitosamente.');

        // Verificar que el cliente fue eliminado de la base de datos
        $this->assertDatabaseMissing('usuarios', [
            'id' => $cliente->id
        ]);
    }
}