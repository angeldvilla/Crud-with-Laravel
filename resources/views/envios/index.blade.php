@extends('adminlte::page')

@section('content_header')
<div class="flex justify-center items-center text-center">
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>Envios</h1>
        </div>
    </div>
    <!-- <a href="{{ route('usuarios.create') }}" class="text-white bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded-full">CREAR NUEVO USUARIO</a> -->
</div>
@stop


@section('content')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ver Envios</title>
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

                @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
                @endif

                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <!-- <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ID</th> -->
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ORIGEN</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">DESTINATARIO</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">PESO</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ALTO</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ANCHO</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">PROFUNDIDAD</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">VOLUMEN</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">COSTO</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">DESCRIPCION</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($envios as $envio)
                        <tr>
                            <!-- <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $envio->id }}</td> -->
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $envio->origen }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $envio->destinatario }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $envio->peso }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $envio->alto }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $envio->ancho }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $envio->profundidad }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $envio->volumen }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $envio->costo }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $envio->descripcion }}</td>

                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                <a href="{{ route('envios.edit', $envio, $envio->rol_id) }}" class="text-blue-600 hover:text-blue-900">Editar</a>
                                <form action="{{ route('envios.destroy', $envio->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                </form>
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