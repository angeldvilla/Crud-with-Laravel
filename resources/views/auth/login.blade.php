<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <a href="/" class="text-cyan-600 hover:text-cyan-500 absolute top-4 left-4">Volver al inicio</a>
    <div class="w-full max-w-md bg-white shadow-lg rounded-lg p-8">
        <h2 class="text-2xl font-bold mb-6 text-center">Iniciar Sesión</h2>
        <form action="#" method="POST">
            @csrf
            <div class="mb-4">
                <label for="correo" class="block text-sm font-medium text-gray-700">Correo Electrónico</label>
                <input type="email" id="correo" name="correo" placeholder="Ingrese su correo electrónico" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
            </div>
            <div class="mb-4">
                <label for="password" class="block text-sm font-medium text-gray-700">Contraseña</label>
                <input type="password" id="password" name="password" placeholder="Ingrese su contraseña" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500 sm:text-sm" required>
            </div>
            <button type="submit" class="w-full bg-cyan-600 hover:bg-cyan-800 duration-300 text-white py-2 px-4 rounded-lg text-lg">Iniciar Sesión</button>
            <p class="mt-4 text-center text-gray-600">¿No tienes una cuenta? <a href="/registro" class="text-cyan-600 hover:text-cyan-500">Regístrate aquí</a></p>
        </form>
    </div>
</body>

</html>