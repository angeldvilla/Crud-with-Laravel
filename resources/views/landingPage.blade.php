<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Envíos Nacionales</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
    <!-- Navbar -->
    <nav class="bg-blue-800 p-4 fixed w-full top-0 left-0 z-50 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="#" class="text-white text-2xl font-bold">Envíos Nacionales</a>
            <div>
                <a href="#inicio" class="text-white hover:text-gray-300 px-4">Inicio</a>
                <a href="#servicios" class="text-white hover:text-gray-300 px-4">Servicios</a>
                <a href="#nosotros" class="text-white hover:text-gray-300 px-4">Nosotros</a>
                <a href="#contacto" class="text-white hover:text-gray-300 px-4">Contacto</a>
                <a href="/login" class="bg-blue-600 hover:bg-blue-500 text-white px-4 py-2 rounded ml-4">Iniciar Sesión</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="inicio" class="bg-blue-900 text-white h-screen flex flex-col justify-center items-center text-center">
        <h1 class="text-4xl md:text-6xl font-bold mb-4">Bienvenido a Envíos Nacionales</h1>
        <p class="text-lg md:text-xl mb-8">Tu solución integral para la gestión de envíos a nivel nacional.</p>
        <a href="#servicios" class="bg-white text-blue-900 hover:bg-gray-100 px-6 py-3 rounded-lg text-lg">Descubre Más</a>
    </section>

    <!-- Servicios Section -->
    <section id="servicios" class="py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8">Nuestros Servicios</h2>
            <p class="text-lg mb-8">Descubre nuestras soluciones de envío, logística y gestión de paquetes.</p>
            <div class="flex flex-wrap justify-center">
                <div class="w-full md:w-1/3 px-4 mb-8">
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h3 class="text-xl font-semibold mb-4">Envíos Rápidos</h3>
                        <p>Entregas rápidas y eficientes para tus paquetes.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-4 mb-8">
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h3 class="text-xl font-semibold mb-4">Seguimiento en Tiempo Real</h3>
                        <p>Sigue el estado de tus envíos en tiempo real.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-4 mb-8">
                    <div class="bg-white shadow-lg rounded-lg p-6">
                        <h3 class="text-xl font-semibold mb-4">Soporte Dedicado</h3>
                        <p>Estamos aquí para resolver cualquier inconveniente.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Nosotros Section -->
    <section id="nosotros" class="bg-gray-200 py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8">Nosotros</h2>
            <p class="text-lg mb-8">Conoce a nuestro equipo y nuestra misión de ofrecer el mejor servicio de envíos.</p>
            <a href="#contacto" class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-3 rounded-lg text-lg">Contáctanos</a>
        </div>
    </section>

    <!-- Contacto Section -->
    <section id="contacto" class="py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8">Contacto</h2>
            <p class="text-lg mb-8">Estamos aquí para ayudarte. Ponte en contacto con nosotros para cualquier consulta.</p>
            <form action="#" method="post" class="max-w-lg mx-auto">
                <input type="text" name="nombre" placeholder="Nombre" class="w-full p-3 mb-4 border border-gray-300 rounded-lg">
                <input type="email" name="correo" placeholder="Correo Electrónico" class="w-full p-3 mb-4 border border-gray-300 rounded-lg">
                <textarea name="mensaje" placeholder="Mensaje" rows="4" class="w-full p-3 mb-4 border border-gray-300 rounded-lg"></textarea>
                <button type="submit" class="bg-blue-600 hover:bg-blue-500 text-white px-6 py-3 rounded-lg text-lg">Enviar Mensaje</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-800 text-white py-4 text-center">
        <p>&copy; 2024 Envíos Nacionales. Todos los derechos reservados.</p>
    </footer>
</body>

</html>