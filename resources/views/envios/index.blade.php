@extends('adminlte::page')

@section('title', 'Envios')

@section('content_header')
<div class="flex justify-center items-center text-center">
    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <h1>Envios</h1>
        </div>
    </div>
    <a href="{{ route('envios.create') }}" class="text-white bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded-full">CREAR NUEVO ENVIO</a>
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
                
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <div class="overflow-x-auto">

                <div class="flex justify-between items-center mb-8">
                    <div class="flex justify-start">
                        <a href="{{ route('envios.export-excel') }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Exportar Excel
                        </a>
                    </div>
                    <div class="flex justify-end">
                        <a href="{{ route('envios.export-pdf') }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Exportar PDF
                        </a>
                    </div>
                </div>

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
                                <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ACCIONES</th>
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
                                    <div class="flex justify-center space-x-2">
                                        <a href="{{ route('envios.show', $envio->id) }}" class="text-yellow-600 hover:text-blue-900">Ver</a>
                                        <a href="{{ route('envios.edit', $envio->id) }}" class="text-blue-600 hover:text-blue-900">Editar</a>
                                        <form action="{{ route('envios.destroy', $envio->id) }}" method="POST" class="inline-block">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

</body>

</html>
@stop