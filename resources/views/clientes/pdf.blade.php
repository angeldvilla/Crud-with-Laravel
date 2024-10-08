<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Listado de Clientes</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-gray-100 p-6">

    <h1 class="text-3xl font-bold mb-6 text-center">Listado de Clientes</h1>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
            <thead class="bg-gray-200">
                <tr>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Nombre</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Apellido</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Correo</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Teléfono</th>
                    <th class="py-3 px-4 text-left font-semibold text-gray-700">Dirección</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-gray-200">
                @foreach($clientes as $cliente)
                    <tr class="hover:bg-gray-100">
                        <td class="py-3 px-4">{{ $cliente->nombre }}</td>
                        <td class="py-3 px-4">{{ $cliente->apellido }}</td>
                        <td class="py-3 px-4">{{ $cliente->correo }}</td>
                        <td class="py-3 px-4">{{ $cliente->telefono }}</td>
                        <td class="py-3 px-4">{{ $cliente->direccion }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

</body>
</html>
