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
    <nav class="bg-blue-600 p-4 fixed w-full top-0 left-0 z-50 shadow-md">
        <div class="container mx-auto flex justify-between items-center">
            <a href="/" class="text-white text-2xl font-bold flex flex-row-reverse gap-3">Envíos Nacionales
                <img src="https://static.vecteezy.com/system/resources/previews/014/034/125/original/truck-box-delivery-3d-illustration-png.png" class="w-10 h-10">
            </a>
            <div>
                <a href="#inicio" class="text-white hover:text-gray-300 px-4">Inicio</a>
                <a href="#servicios" class="text-white hover:text-gray-300 px-4">Servicios</a>
                <a href="#nosotros" class="text-white hover:text-gray-300 px-4">Nosotros</a>
                <a href="#contacto" class="text-white hover:text-gray-300 px-4">Contacto</a>
                <a href="/login" class="bg-white text-blue-900 hover:bg-gray-200 transition duration-300 px-4 py-2 rounded-full ml-4">Iniciar Sesión</a>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <section id="inicio" class="relative text-white h-screen flex flex-col items-center justify-center text-center bg-cover bg-center" style="background-image: url('https://cdn.pixabay.com/photo/2024/03/26/11/57/e-commerce-8656646_1280.jpg');">

        <div class="absolute inset-0 bg-black opacity-60"></div>

        <div class="relative z-10">
            <h1 class="text-4xl md:text-6xl font-bold mb-4">Bienvenido a Envíos Nacionales</h1>
            <p class="text-lg md:text-xl mb-8">Tu solución integral para la gestión de envíos a nivel nacional.</p>
            <a href="#servicios" class="bg-white text-blue-900 hover:bg-gray-200 transition duration-300 px-6 py-3 rounded-lg text-lg">Descubre Más</a>
        </div>

    </section>

    <!-- Servicios Section -->
    <section id="servicios" class="py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8">Nuestros Servicios</h2>
            <p class="text-lg mb-8">Descubre nuestras soluciones de envío, logística y gestión de paquetes.</p>
            <div class="flex flex-wrap justify-center">
                <div class="w-full md:w-1/3 px-4 mb-8">
                    <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center justify-center">
                        <img src="https://cdn-icons-png.freepik.com/512/1554/1554486.png" class="w-16 h-14 mb-4">
                        <h3 class="text-xl font-semibold mb-4">Envíos Rápidos</h3>
                        <p>Entregas rápidas y eficientes para tus paquetes.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-4 mb-8">
                    <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center justify-center">
                        <img src="https://cdn-icons-png.freepik.com/512/16919/16919191.png" class="w-18 h-16 mb-4">
                        <h3 class="text-xl font-semibold mb-4">Seguimiento en Tiempo Real</h3>
                        <p>Sigue el estado de tus envíos en tiempo real.</p>
                    </div>
                </div>
                <div class="w-full md:w-1/3 px-4 mb-8">
                    <div class="bg-white shadow-lg rounded-lg p-6 flex flex-col items-center justify-center">
                        <img src="https://www.seekpng.com/png/full/831-8315397_technical-support-vector-de-soporte-tecnico-png.png" class="w-12 h-14 mb-4">
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
            <p class="text-lg mb-8">Somos una empresa de envío de paquetes que se dedica a brindar soluciones integrales para la gestión de paquetes.</p>

            <div class="flex flex-col md:flex-row items-center justify-center text-center gap-10 mb-12">

                <img src="https://image.jimcdn.com/app/cms/image/transf/none/path/sef3ea864a6dbea5a/image/i65a6805cdd234e0d/version/1544149071/image.jpg" class="w-52 h-48 mb-4 rounded-lg">

                <img src="https://3cero.com/wp-content/uploads/2014/10/La-importancia-del-servicio-de-entrega-a-domicilio.jpg" class="w-52 h-48 mb-4 rounded-full">

                <img src="https://www.evopayments.mx/blog/wp-content/uploads/2022/11/Blog1-770x513.jpg" class="w-52 h-48 mb-4 rounded-lg">
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12">
                <div>
                    <h3 class="text-2xl font-bold mb-4">Misión</h3>
                    <p class="text-lg">Proporcionar servicios de envío confiables, eficientes y accesibles que conecten a personas y empresas en todo el país, garantizando la entrega oportuna y segura de paquetes mediante soluciones innovadoras y un servicio al cliente excepcional.</p>
                </div>
                <div>
                    <h3 class="text-2xl font-bold mb-4">Visión</h3>
                    <p class="text-lg">Ser la empresa líder en gestión de envíos nacionales, reconocida por nuestra excelencia operativa, innovación tecnológica y compromiso con la satisfacción del cliente, contribuyendo al crecimiento y desarrollo económico a través de una logística sostenible y efectiva.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Contacto Section -->
    <section id="contacto" class="py-16">
        <div class="container mx-auto text-center">
            <h2 class="text-3xl font-bold mb-8">Contacto</h2>
            <p class="text-lg mb-8">Estamos aquí para ayudarte. Ponte en contacto con nosotros para cualquier consulta.</p>
            <form action="#" method="post" class="bg-gray-200 p-10 rounded-lg max-w-lg mx-auto">
                <input type="text" name="nombre" placeholder="Nombre" class="w-full p-3 mb-4 border border-gray-300 rounded-lg">
                <input type="email" name="correo" placeholder="Correo Electrónico" class="w-full p-3 mb-4 border border-gray-300 rounded-lg">
                <textarea name="mensaje" placeholder="Mensaje" rows="4" class="w-full p-3 mb-4 border border-gray-300 rounded-lg"></textarea>
                <button type="submit" class="bg-blue-600 hover:bg-blue-500 duration-300 text-white px-6 py-3 rounded-lg text-lg">Enviar Mensaje</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-blue-600 text-white py-4 text-center">
        <p>&copy; 2024 Envíos Nacionales. Todos los derechos reservados.</p>
    </footer>
</body>

</html>