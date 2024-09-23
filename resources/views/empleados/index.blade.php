@extends('adminlte::page')

@section('title', 'Empleados')

@section('content_header')
<div class="flex justify-center items-center text-center">
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>Empleados</h1>
        </div>
    </div>
    <a href="{{ route('empleados.create') }}" class="text-white bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded-full">CREAR NUEVO EMPLEADO</a>
</div>
@stop


@section('content')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ver Empleados</title>
    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />
    {{-- Styles Tailwind --}}
    @vite('resources/css/app.css')
</head>

<body>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-700 overflow-hidden shadow-xl sm:rounded-lg">
                <!-- <div class="mb-4">
                    <a href="{{ route('empleados.create') }}" class="text-white bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded">CREAR NUEVO EMPLEADO</a>
                </div> -->

                @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
                @endif

                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <!-- <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ID</th> -->
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">NOMBRE</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">APELLIDO</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">CORREO</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">TELEFONO</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">DIRECCIÓN</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($empleados as $empleado)
                        <tr>
                            <!-- <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $empleado->id }}</td> -->
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $empleado->nombre }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $empleado->apellido }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $empleado->correo }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $empleado->telefono }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $empleado->direccion }}</td>

                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                <a href="{{ route('empleados.edit', $empleado) }}" class="text-blue-600 hover:text-blue-900">Editar</a>
                                
                                @can('delete', $empleado)
                                <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                </form>
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>
@stop