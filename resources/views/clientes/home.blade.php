<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mi Perfil</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex flex-col items-center justify-center min-h-screen">
    <!-- Navbar -->
    <nav class="bg-blue-600 p-4 fixed w-full top-0 left-0 z-50 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-white text-2xl font-bold flex flex-row-reverse gap-3">Envíos Nacionales
                <img src="https://static.vecteezy.com/system/resources/previews/014/034/125/original/truck-box-delivery-3d-illustration-png.png" class="w-10 h-10">
            </a>
            <div>
                <a href="http://127.0.0.1:8000#inicio" class="text-white hover:text-gray-300 px-4">Inicio</a>
                <a href="http://127.0.0.1:8000#servicios" class="text-white hover:text-gray-300 px-4">Servicios</a>
                <a href="http://127.0.0.1:8000#nosotros" class="text-white hover:text-gray-300 px-4">Nosotros</a>
                <a href="http://127.0.0.1:8000#contacto" class="text-white hover:text-gray-300 px-4">Contacto</a>
                @if(Auth::check())
                <div class="relative inline-block text-left">
                    <button id="dropdownButton" class="bg-white text-blue-900 hover:bg-gray-200 transition duration-300 px-4 py-2 rounded-full ml-4">
                        {{ Auth::user()->nombre }}
                    </button>
                    <div id="dropdownMenu" class="hidden absolute right-0 mt-2 w-48 bg-white rounded-md shadow-lg">
                        <a href="{{ route('home') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Perfil</a>
                        <a href="{{ route('mis-envios') }}" class="block px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">Ver Envíos</a>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="block w-full text-left px-4 py-2 text-sm text-white bg-red-500 hover:bg-red-700">Cerrar Sesión</button>
                        </form>
                    </div>
                </div>
                @else
                <a href="/login" class="bg-white text-blue-900 hover:bg-gray-200 transition duration-300 px-4 py-2 rounded-full ml-4">Iniciar Sesión</a>
                @endif
            </div>
        </div>
    </nav>

    <!-- Contenedor del Perfil -->
    <div class="w-full max-w-4xl bg-white shadow-lg rounded-lg p-8 mt-20 mx-auto">


        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif

        <!-- Título de Bienvenida -->
        <div class="text-center mb-8">
            <h1 class="text-4xl font-bold">Bienvenido, {{ Auth::user()->nombre }}</h1>
        </div>

        <!-- Información del Perfil en Columnas -->
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
            <!-- Nombre y Apellido -->
            <div class="flex flex-col">
                <label class="text-lg font-semibold mb-2" for="nombre">Nombre:</label>
                <span class="border-b border-gray-300 py-2">{{ Auth::user()->nombre }}</span>
            </div>
            <div class="flex flex-col">
                <label class="text-lg font-semibold mb-2" for="apellido">Apellido:</label>
                <span class="border-b border-gray-300 py-2">{{ Auth::user()->apellido }}</span>
            </div>

            <!-- Correo Electrónico y Teléfono -->
            <div class="flex flex-col">
                <label class="text-lg font-semibold mb-2" for="correo">Correo Electrónico:</label>
                <span class="border-b border-gray-300 py-2">{{ Auth::user()->correo }}</span>
            </div>
            <div class="flex flex-col">
                <label class="text-lg font-semibold mb-2" for="telefono">Teléfono:</label>
                <span class="border-b border-gray-300 py-2">{{ Auth::user()->telefono }}</span>
            </div>

            <!-- Dirección (Columna completa) -->
            <div class="flex flex-col col-span-2">
                <label class="text-lg font-semibold mb-2" for="direccion">Dirección:</label>
                <span class="border-b border-gray-300 py-2">{{ Auth::user()->direccion }}</span>
            </div>
        </div>

        <!-- Botones de Acción (Editar y Ver Envíos) -->
        <div class="flex justify-center gap-6 mt-8">
            <button id="editProfileButton" class="bg-blue-600 hover:bg-blue-800 text-white px-6 py-3 rounded-lg">
                Editar Perfil
            </button>
            <a href="{{ route('mis-envios') }}" class="bg-yellow-600 hover:bg-yellow-800 text-white px-6 py-3 rounded-lg">
                Ver mis envíos
            </a>
        </div>
    </div>

    <!-- Modal para Editar Perfil -->
    <div id="editProfileModal" class="flex fixed inset-0 bg-gray-900 bg-opacity-75 items-center justify-center hidden z-50">
        <div class="bg-white p-8 rounded-lg shadow-lg w-full max-w-lg">
            <h2 class="text-2xl font-bold mb-4">Editar Perfil</h2>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif

            <form action="{{ route('clientes.update',  Auth::user()->id ) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="nombre" class="block text-gray-700">Nombre</label>
                    <input type="text" id="nombre" name="nombre" value="{{ Auth::user()->nombre }}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="apellido" class="block text-gray-700">Apellido</label>
                    <input type="text" id="apellido" name="apellido" value="{{ Auth::user()->apellido }}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="correo" class="block text-gray-700">Correo Electrónico</label>
                    <input type="email" id="correo" name="correo" value="{{ Auth::user()->correo }}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="telefono" class="block text-gray-700">Teléfono</label>
                    <input type="text" id="telefono" name="telefono" value="{{ Auth::user()->telefono }}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
                <div class="mb-4">
                    <label for="direccion" class="block text-gray-700">Dirección</label>
                    <input type="text" id="direccion" name="direccion" value="{{ Auth::user()->direccion }}" class="w-full px-3 py-2 border border-gray-300 rounded-md">
                </div>
                <div class="flex justify-end">
                    <button type="button" id="cancelEdit" class="bg-gray-400 hover:bg-gray-500 text-white px-4 py-2 rounded-lg mr-2">Cancelar</button>
                    <button type="submit" class="bg-blue-600 hover:bg-blue-800 text-white px-4 py-2 rounded-lg">Guardar Cambios</button>
                </div>
            </form>
        </div>
    </div>

</body>

<script>
    document.getElementById('dropdownButton').addEventListener('click', function() {
        document.getElementById('dropdownMenu').classList.toggle('hidden');
    });

    document.getElementById('editProfileButton').addEventListener('click', function() {
        document.getElementById('editProfileModal').classList.remove('hidden');
    });

    document.getElementById('cancelEdit').addEventListener('click', function() {
        document.getElementById('editProfileModal').classList.add('hidden');
    });
</script>

</html>