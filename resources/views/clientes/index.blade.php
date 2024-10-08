@extends('adminlte::page')

@section('title', 'Clientes')

@section('content_header')
<div class="flex justify-center items-center text-center">
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>Clientes</h1>
        </div>
    </div>
    <a href="{{ route('clientes.create') }}" class="text-white bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded-full">CREAR NUEVO CLIENTE</a>
</div>

@stop


@section('content')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ver Clientes</title>
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
                    <a href="{{ route('clientes.create') }}" class="text-white bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded">CREAR NUEVO CLIENTE</a>
                </div> -->

                @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <div class="flex justify-between items-center mb-8">
                    <div class="flex justify-start">
                        <a href="{{ route('clientes.export-excel') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Exportar Excel
                        </a>
                    </div>
                    <div class="flex justify-end">
                        <a href="{{ route('clientes.export-pdf') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Exportar PDF
                        </a>
                    </div>
                </div>


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
                        @foreach ($clientes as $client)
                        <tr>
                            <!-- <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $client->id }}</td> -->
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $client->nombre }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $client->apellido }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $client->correo }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $client->telefono }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $client->direccion }}</td>

                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                <a href="{{ route('clientes.edit', $client) }}" class="text-blue-600 hover:text-blue-900">Editar</a>
                                @if(Auth::check())
                                @if(Auth::user()->esAdmin())
                                <form action="{{ route('clientes.destroy', $client->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                </form>
                                @endif
                                @endif
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