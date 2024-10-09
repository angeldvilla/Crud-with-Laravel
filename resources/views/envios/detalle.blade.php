@extends('adminlte::page')

@section('content_header')
<div class="flex justify-center items-center text-center">
    <h1>Detalle Envio</h1>
</div>
@stop

@section('content')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle Envio</title>
    @vite('resources/css/app.css')
</head>

<body>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-600 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <p class="text-white"><strong>Origen:</strong> {{ $envio->origen }}</p>
                <p class="text-white"><strong>Destinatario:</strong> {{ $envio->destinatario }}</p>
                <div class="grid grid-cols-2 gap-4 p-4 rounded-md mt-4">
                    <p class="text-white"><strong>Peso:</strong> {{ $envio->peso }} Kg</p>
                    <p class="text-white"><strong>Alto:</strong> {{ $envio->alto }} cm</p>
                    <p class="text-white"><strong>Ancho:</strong> {{ $envio->ancho }} cm</p>
                    <p class="text-white"><strong>Profundidad:</strong> {{ $envio->profundidad }} cm</p>
                    <p class="text-white"><strong>Volumen:</strong> {{ $envio->volumen }} cm³</p>
                </div>


                <p class="text-white mt-2 mb-4"><strong>Costo:</strong> <span class="text-green-500"> ${{ $envio->costo }} COP</span></p>
                <p class="text-white"><strong>Descripción:</strong> {{ $envio->descripcion }}</p>


                <div class="bg-gray-100 p-4 rounded-md mt-4">
                    <h3 class="text-lg font-semibold mb-2">Cliente Asignado</h3>
                    <p><strong>Nombre del Cliente:</strong> {{ $cliente->nombre }} {{ $cliente->apellido }}</p>
                    <p><strong>Telefono:</strong> {{ $cliente->telefono }}</p>
                    <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
                    <p><strong>Estado del Envío:</strong> <span class={{$clienteEnvio->estado == "en camino" ? "text-yellow-500" : ($clienteEnvio->estado == "pendiente" ? "text-red-500" : "text-green-500")}}>{{ $clienteEnvio->estado }}</span></p>
                </div>

                    <div class="flex justify-center items-center mt-4">
                        <a href="{{ route('envios.index') }}" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                            Volver
                        </a>
                    </div>

                    <div class="flex justify-center items-center mt-4 gap-10">
                        <a href="{{ route('detalle-envio.export-excel', $envio->id) }}" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                            Exportar Excel
                        </a>
        
                        <a href="{{ route('detalle-envio.export-pdf', $envio->id) }}" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                            Exportar PDF
                        </a>
                    </div>
                </div>
            </div>
        </div>

</body>

</html>
@stop