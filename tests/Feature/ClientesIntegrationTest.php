<?php

namespace Tests\Feature;

use App\Models\Roles;
use App\Models\Usuarios;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;

uses(TestCase::class, RefreshDatabase::class)->in('Feature');

beforeEach(function () {
    // Crear roles necesarios
    Roles::factory()->create(['id' => 1, 'rol' => 'Administrador']);
    Roles::factory()->create(['id' => 2, 'rol' => 'Empleado']);
    Roles::factory()->create(['id' => 3, 'rol' => 'Cliente']);
});

it('puede crear y ver un cliente', function () {
    // Crear un usuario administrador y autenticarlo
    $adminUser = Usuarios::factory()->create(['id_rol' => 1, 'password' => Hash::make('admin123')]);
    $this->actingAs($adminUser); // Simular autenticación

    // Crear un cliente
    $data = [
        'nombre' => 'John',
        'apellido' => 'Doe',
        'correo' => 'john@example.com',
        'telefono' => '1234567890',
        'direccion' => '123 Main St',
        'password' => bcrypt('123456'),
        'id_rol' => 3,
    ];

    // Hacer la petición POST para crear un cliente
    $this->post(route('clientes.store'), $data);

    // Verificar que el cliente se muestra en la vista de clientes
    $response = $this->get(route('clientes.index'));

    // Asegurarse de que la respuesta sea exitosa y que la vista tenga el cliente
    $response->assertStatus(200)
             ->assertSee('John')
             ->assertSee('Doe')
             ->assertSee('john@example.com');
});

it('no puede crear un cliente con datos inválidos', function () {
    // Crear un usuario administrador y autenticarlo
    $adminUser = Usuarios::factory()->create(['id_rol' => 1, 'password' => Hash::make('admin123')]);
    $this->actingAs($adminUser); // Simular autenticación

    // Datos inválidos
    $data = [
        'nombre' => '', // Campo vacío
        'apellido' => 'Doe',
        'correo' => 'not-an-email',
        'telefono' => '1234567890',
        'direccion' => '123 Main St',
        'password' => bcrypt('123456'),
        'id_rol' => 3,
    ];

    // Hacer la petición POST para crear un cliente
    $response = $this->post(route('clientes.store'), $data);

    // Asegurarse de que la validación falle
    $response->assertStatus(422);
});

it('puede actualizar un cliente y verlo', function () {
    // Crear un usuario administrador y autenticarlo
    $adminUser = Usuarios::factory()->create(['id_rol' => 1, 'password' => Hash::make('admin123')]);
    $this->actingAs($adminUser); // Simular autenticación

    // Crear un cliente usando el factory
    $cliente = Usuarios::factory()->create(['id_rol' => 3]);

    // Actualizar el cliente
    $updatedData = [
        'nombre' => 'Jane',
        'apellido' => 'Doe',
        'correo' => 'jane@example.com',
        'telefono' => '9876543210',
        'direccion' => '456 Main St',
    ];

    // Hacer la petición PUT para actualizar el cliente
    $this->put(route('clientes.update', $cliente->id), $updatedData);

    // Verificar que los datos del cliente actualizados se muestran en la vista de clientes
    $response = $this->get(route('clientes.index'));

    // Asegurarse de que la respuesta sea exitosa y que los datos actualizados se muestren
    $response->assertStatus(200)
             ->assertSee('Jane')
             ->assertSee('Doe')
             ->assertSee('jane@example.com');
});

it('puede eliminar un cliente y no verlo', function () {
    // Crear un usuario administrador y autenticarlo
    $adminUser = Usuarios::factory()->create(['id_rol' => 1, 'password' => Hash::make('admin123')]);
    $this->actingAs($adminUser); // Simular autenticación

    // Crear un cliente usando el factory
    $cliente = Usuarios::factory()->create(['id_rol' => 3]);

    // Hacer la petición DELETE para eliminar el cliente
    $this->delete(route('clientes.destroy', $cliente->id));

    // Verificar que el cliente no se muestra en la vista de clientes
    $response = $this->get(route('clientes.index'));

    // Asegurarse de que la respuesta sea exitosa y que el cliente no se muestre
    $response->assertStatus(200)
             ->assertDontSee($cliente->nombre)
             ->assertDontSee($cliente->apellido);
});

it('no puede crear un cliente si no es administrador', function () {
    $nonAdminUser = Usuarios::factory()->create(['id_rol' => 2]); // Usuario empleado
    $this->actingAs($nonAdminUser); // Simular autenticación

    $data = [
        'nombre' => 'John',
        'apellido' => 'Doe',
        'correo' => 'john@example.com',
        'telefono' => '1234567890',
        'direccion' => '123 Main St',
        'password' => bcrypt('123456'),
        'id_rol' => 3,
    ];

    // Hacer la petición POST para crear un cliente
    $response = $this->post(route('clientes.store'), $data);
    
    // Asegurarse de que se prohíba el acceso
    $response->assertStatus(403);
});
