@extends('adminlte::page')

@section('content_header')
<div class="flex justify-center items-center text-center">
    <h1>Crear Envio</h1>
</div>
@stop

@section('content')
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Envio</title>
    @vite('resources/css/app.css')
</head>

<body>

    <div class="py-12">
        <div class="max-w-xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-gray-700 overflow-hidden shadow-xl sm:rounded-lg p-6 lg:p-8">

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('envios.store') }}" method="POST" class="max-w-sm mx-auto">
                    @csrf

                    <div class="mb-5">
                        <label for="origen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Origen</label>
                        <input type="text" name="origen" id="origen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>

                    <div class="mb-5">
                        <label for="destinatario" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">destinatario</label>
                        <input type="text" name="destinatario" id="destinatario" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>

                    <div class="mb-5">
                        <label for="peso" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Peso</label>
                        <input type="number" name="peso" id="peso" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>

                    <div class="mb-5">
                        <label for="alto" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Alto</label>
                        <input type="number" name="alto" id="alto" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>

                    <div class="mb-5">
                        <label for="ancho" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Ancho</label>
                        <input type="number" name="ancho" id="ancho" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>

                    <div class="mb-5">
                        <label for="profundidad" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Profundidad</label>
                        <input type="number" name="profundidad" id="profundidad" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>

                    <div class="mb-5">
                        <label for="volumen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Volumen</label>
                        <input type="number" name="volumen" id="volumen" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required readonly>
                    </div>

                    <div class="mb-5">
                        <label for="costo" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Costo</label>
                        <input type="number" name="costo" id="costo" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required readonly>
                    </div>

                    <div class="mb-5">
                        <label for="descripcion" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Descripción</label>
                        <input type="text" name="descripcion" id="descripcion" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                    </div>


                    <select name="id_cliente" id="id_cliente" class="bg-gray-50 mb-12 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" required>
                        <option value="" disabled selected>Selecciona un cliente</option>
                        @foreach($clientes as $cliente)
                        <option value="{{ $cliente->id }}">{{ $cliente->nombre}} {{ $cliente->apellido }}</option>
                        @endforeach
                    </select>

                    <!-- <input type="hidden" name="estado" id="estado" value="pendiente" required> -->

                    <button type="submit" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Guardar</button>
                    <a href="{{ route('envios.index') }}" class="text-white bg-slate-700 hover:bg-slate-800 focus:ring-4 focus:outline-none focus:ring-slate-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-slate-600 dark:hover:bg-slate-700 dark:focus:ring-slate-800">Cancelar</a>

                </form>

            </div>
        </div>
    </div>

</body>

<script>
    function calcularVolumen() {
        const alto = parseFloat(document.getElementById('alto').value) || 0;
        const ancho = parseFloat(document.getElementById('ancho').value) || 0;
        const profundidad = parseFloat(document.getElementById('profundidad').value) || 0;
        const volumen = alto * ancho * profundidad;

        document.getElementById('volumen').value = volumen;
        calcularCosto();
    }

    function calcularCosto() {
        const costoBase = 5000;
        const costoPorPeso = parseFloat(document.getElementById('peso').value) * 1000 || 0;
        const costoPorVolumen = (parseFloat(document.getElementById('volumen').value) / 1000000) * 2000 || 0;

        const costoTotal = costoBase + costoPorPeso + costoPorVolumen;
        document.getElementById('costo').value = costoTotal.toFixed(0);
    }

    document.getElementById('alto').addEventListener('input', calcularVolumen);
    document.getElementById('ancho').addEventListener('input', calcularVolumen);
    document.getElementById('profundidad').addEventListener('input', calcularVolumen);
    document.getElementById('peso').addEventListener('input', calcularCosto);
</script>

</html>
@stop