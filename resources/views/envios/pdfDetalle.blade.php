<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle de Envio</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-white text-gray-900">

    <div class="container mx-auto my-10 p-6 bg-white rounded-lg shadow-md">
        <h1 class="text-2xl font-semibold text-center mb-6">Detalle de Envío</h1>

        <div class="border-b pb-4 mb-6">
            <p><strong>Origen:</strong> {{ $envio->origen }}</p>
            <p><strong>Destinatario:</strong> {{ $envio->destinatario }}</p>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <p><strong>Peso:</strong> {{ $envio->peso }} Kg</p>
            <p><strong>Alto:</strong> {{ $envio->alto }} cm</p>
            <p><strong>Ancho:</strong> {{ $envio->ancho }} cm</p>
            <p><strong>Profundidad:</strong> {{ $envio->profundidad }} cm</p>
            <p><strong>Volumen:</strong> {{ $envio->volumen }} cm³</p>
        </div>

        <p class="mt-4"><strong>Costo:</strong> <span class="text-green-500">${{ $envio->costo }} COP</span></p>
        <p class="mt-4"><strong>Descripción:</strong> {{ $envio->descripcion }}</p>

        <div class="bg-gray-100 p-4 rounded-lg mt-6">
            <h3 class="text-lg font-semibold mb-2">Cliente Asignado</h3>
            <p><strong>Nombre del Cliente:</strong> {{ $cliente->nombre }} {{ $cliente->apellido }}</p>
            <p><strong>Teléfono:</strong> {{ $cliente->telefono }}</p>
            <p><strong>Dirección:</strong> {{ $cliente->direccion }}</p>
            <p><strong>Estado del Envío:</strong> 
                <span class="{{ $clienteEnvio->estado == 'en camino' ? 'text-yellow-500' : ($clienteEnvio->estado == 'pendiente' ? 'text-red-500' : 'text-green-500') }}">
                    {{ $clienteEnvio->estado }}
                </span>
            </p>
        </div>

    </div>

</body>
</html>
