<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Envios</title>
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


    <!-- Tabla de Envíos de usuario -->
    <div class="flex justify-center items-center mt-32 mb-14">
        <h1 class="text-4xl font-bold text-black">Mis Envíos</h1>
    </div>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="overflow-x-auto mb-32">
        <table class="table-auto w-96 border-2 border-gray-800">
            <thead>
                <tr class="bg-gray-700">
                    <th class="border border-gray-800 px-4 py-2 text-white text-center">ORIGEN</th>
                    <th class="border border-gray-800 px-4 py-2 text-white text-center">DESTINATARIO</th>
                    <th class="border border-gray-800 px-4 py-2 text-white text-center">PESO</th>
                    <th class="border border-gray-800 px-4 py-2 text-white text-center">ALTO</th>
                    <th class="border border-gray-800 px-4 py-2 text-white text-center">ANCHO</th>
                    <th class="border border-gray-800 px-4 py-2 text-white text-center">PROFUNDIDAD</th>
                    <th class="border border-gray-800 px-4 py-2 text-white text-center">VOLUMEN</th>
                    <th class="border border-gray-800 px-4 py-2 text-white text-center">COSTO</th>
                    <th class="border border-gray-800 px-4 py-2 text-white text-center">DESCRIPCION</th>
                    <th class="border border-gray-800 px-4 py-2 text-white text-center">ESTADO</th>
                </tr>
            </thead>
            <tbody>
                @if ($envio->isEmpty())
                <tr>
                    <td colspan="10" class="text-center py-4">No tienes envíos registrados.</td>
                </tr>
                @else
                @foreach ($envio as $env)
                <tr class="bg-slate-300">
                    <td class="border border-gray-800 px-4 py-2 text-black text-center">{{ $env->origen }}</td>
                    <td class="border border-gray-800 px-4 py-2 text-black text-center">{{ $env->destinatario }}</td>
                    <td class="border border-gray-800 px-4 py-2 text-black text-center">{{ $env->peso }}</td>
                    <td class="border border-gray-800 px-4 py-2 text-black text-center">{{ $env->alto }}</td>
                    <td class="border border-gray-800 px-4 py-2 text-black text-center">{{ $env->ancho }}</td>
                    <td class="border border-gray-800 px-4 py-2 text-black text-center">{{ $env->profundidad }}</td>
                    <td class="border border-gray-800 px-4 py-2 text-black text-center">{{ $env->volumen }}</td>
                    <td class="border border-gray-800 px-4 py-2 text-black text-center">{{ $env->costo }}</td>
                    <td class="border border-gray-800 px-4 py-2 text-black text-center">{{ $env->descripcion }}</td>
                    <td class="border border-gray-800 px-4 py-2 text-black text-center">{{ $cliente_envio->estado }}</td>
                </tr>
                @endforeach
                @endif
            </tbody>
        </table>
    </div>

</body>

<script>
    document.getElementById('dropdownButton').addEventListener('click', function() {
        document.getElementById('dropdownMenu').classList.toggle('hidden');
    });
</script>

</html>