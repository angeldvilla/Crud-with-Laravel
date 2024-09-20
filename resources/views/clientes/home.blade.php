<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">
    <div class="w-full max-w-lg bg-white shadow-lg rounded-lg p-8">
        <h1 class="text-3xl font-bold mb-4 text-center">Bienvenido, {{ Auth::user()->nombre }}</h1>

        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Mi Perfil</h2>
            <p><strong>Nombre:</strong> {{ Auth::user()->nombre }}</p>
            <p><strong>Apellido:</strong> {{ Auth::user()->apellido }}</p>
            <p><strong>Correo Electrónico:</strong> {{ Auth::user()->correo }}</p>
            <p><strong>Teléfono:</strong> {{ Auth::user()->telefono }}</p>
            <p><strong>Dirección:</strong> {{ Auth::user()->direccion }}</p>
        </div>

        <div class="mb-6">
            <h2 class="text-xl font-semibold mb-2">Mis Envíos</h2>
            <p>Aquí podrás ver tus envíos...</p> <!-- Agrega la lógica para mostrar los envíos -->
        </div>

        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="w-full bg-red-600 hover:bg-red-800 duration-300 text-white py-2 px-4 rounded-lg text-lg">Cerrar Sesión</button>
        </form>
    </div>
</body>

</html>