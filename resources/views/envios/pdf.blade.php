<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Envios</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-6">

    <h1 class="text-3xl font-bold mb-6 text-center">Listado de Envios</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Origen</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Destinatario</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Peso</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Alto</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Ancho</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Profundidad</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Volumen</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Costo</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Descripción</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($envios as $envio)
                    <tr class="hover:bg-gray-100">
                        <td class="py-3 px-4">{{ $cliente->origen }}</td>
                        <td class="py-3 px-4">{{ $cliente->destinatario }}</td>
                        <td class="py-3 px-4">{{ $cliente->peso }}</td>
                        <td class="py-3 px-4">{{ $cliente->alto }}</td>
                        <td class="py-3 px-4">{{ $cliente->ancho }}</td>
                        <td class="py-3 px-4">{{ $cliente->profundidad }}</td>
                        <td class="py-3 px-4">{{ $cliente->volumen }}</td>
                        <td class="py-3 px-4">{{ $cliente->costo }}</td>
                        <td class="py-3 px-4">{{ $cliente->descripcion }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
