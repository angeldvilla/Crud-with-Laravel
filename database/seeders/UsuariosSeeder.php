<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsuariosSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('usuarios')->insert([
            // Administradores
            [
                'id' => (string) Str::uuid(),
                'nombre' => 'Javier',
                'apellido' => 'Naranjo',
                'correo' => 'javier.naranjo@example.com',
                'telefono' => '3001234567',
                'direccion' => 'Calle 1 #1-1',
                'password' => Hash::make('123456'),
                'id_rol' => 1, // Admin
            ],
            [
                'id' => (string) Str::uuid(),
                'nombre' => 'Manuel',
                'apellido' => 'Cardona',
                'correo' => 'manuel.cardona@example.com',
                'telefono' => '3001234568',
                'direccion' => 'Calle 2 #2-2',
                'password' => Hash::make('123456'),
                'id_rol' => 1, // Admin
            ],
            [
                'id' => (string) Str::uuid(),
                'nombre' => 'Adrian',
                'apellido' => 'Perez',
                'correo' => 'adrian.perez@example.com',
                'telefono' => '3001234569',
                'direccion' => 'Calle 3 #3-3',
                'password' => Hash::make('123456'),
                'id_rol' => 1, // Admin
            ],
            [
                'id' => (string) Str::uuid(),
                'nombre' => 'Juan',
                'apellido' => 'Sanchez',
                'correo' => 'juan.sanchez@example.com',
                'telefono' => '3001234570',
                'direccion' => 'Calle 4 #4-4',
                'password' => Hash::make('123456'),
                'id_rol' => 1, // Admin
            ],
            
            // Empleados
            [
                'id' => (string) Str::uuid(),
                'nombre' => 'Ana',
                'apellido' => 'Gomez',
                'correo' => 'ana.gomez@example.com',
                'telefono' => '3001234571',
                'direccion' => 'Calle 5 #5-5',
                'password' => Hash::make('123456'),
                'id_rol' => 2, // Empleado
            ],
            [
                'id' => (string) Str::uuid(),
                'nombre' => 'Carlos',
                'apellido' => 'Martinez',
                'correo' => 'carlos.martinez@example.com',
                'telefono' => '3001234572',
                'direccion' => 'Calle 6 #6-6',
                'password' => Hash::make('123456'),
                'id_rol' => 2, // Empleado
            ],
            [
                'id' => (string) Str::uuid(),
                'nombre' => 'Laura',
                'apellido' => 'Lopez',
                'correo' => 'laura.lopez@example.com',
                'telefono' => '3001234573',
                'direccion' => 'Calle 7 #7-7',
                'password' => Hash::make('123456'),
                'id_rol' => 2, // Empleado
            ],
            [
                'id' => (string) Str::uuid(),
                'nombre' => 'Pedro',
                'apellido' => 'Hernandez',
                'correo' => 'pedro.hernandez@example.com',
                'telefono' => '3001234574',
                'direccion' => 'Calle 8 #8-8',
                'password' => Hash::make('123456'),
                'id_rol' => 2, // Empleado
            ],
            [
                'id' => (string) Str::uuid(),
                'nombre' => 'Marta',
                'apellido' => 'Rodriguez',
                'correo' => 'marta.rodriguez@example.com',
                'telefono' => '3001234575',
                'direccion' => 'Calle 9 #9-9',
                'password' => Hash::make('123456'),
                'id_rol' => 2, // Empleado
            ],
            [
                'id' => (string) Str::uuid(),
                'nombre' => 'Andres',
                'apellido' => 'Diaz',
                'correo' => 'andres.diaz@example.com',
                'telefono' => '3001234576',
                'direccion' => 'Calle 10 #10-10',
                'password' => Hash::make('123456'),
                'id_rol' => 2, // Empleado
            ],
            
            // Clientes
            [
                'id' => (string) Str::uuid(),
                'nombre' => 'Sofia',
                'apellido' => 'Ramirez',
                'correo' => 'sofia.ramirez@example.com',
                'telefono' => '3001234577',
                'direccion' => 'Calle 11 #11-11',
                'password' => Hash::make('123456'),
                'id_rol' => 3, // Cliente
            ],
            [
                'id' => (string) Str::uuid(),
                'nombre' => 'Miguel',
                'apellido' => 'Torres',
                'correo' => 'miguel.torres@example.com',
                'telefono' => '3001234578',
                'direccion' => 'Calle 12 #12-12',
                'password' => Hash::make('123456'),
                'id_rol' => 3, // Cliente
            ],
            [
                'id' => (string) Str::uuid(),
                'nombre' => 'Lucia',
                'apellido' => 'Vargas',
                'correo' => 'lucia.vargas@example.com',
                'telefono' => '3001234579',
                'direccion' => 'Calle 13 #13-13',
                'password' => Hash::make('123456'),
                'id_rol' => 3, // Cliente
            ],
            [
                'id' => (string) Str::uuid(),
                'nombre' => 'David',
                'apellido' => 'Morales',
                'correo' => 'david.morales@example.com',
                'telefono' => '3001234580',
                'direccion' => 'Calle 14 #14-14',
                'password' => Hash::make('123456'),
                'id_rol' => 3, // Cliente
            ],
            [
                'id' => (string) Str::uuid(),
                'nombre' => 'Elena',
                'apellido' => 'Cruz',
                'correo' => 'elena.cruz@example.com',
                'telefono' => '3001234581',
                'direccion' => 'Calle 15 #15-15',
                'password' => Hash::make('123456'),
                'id_rol' => 3, // Cliente
            ],
        ]);
    }
}
