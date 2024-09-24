<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso</title>
    <style>
        /* Integración de Tailwind CSS en línea para correos electrónicos */
        .bg-gray-100 {
            background-color: #f7fafc;
        }

        .bg-white {
            background-color: #ffffff;
        }

        .text-gray-800 {
            color: #2d3748;
        }

        .text-gray-700 {
            color: #4a5568;
        }

        .text-gray-600 {
            color: #718096;
        }

        .text-blue-500 {
            color: #4299e1;
        }

        .font-bold {
            font-weight: 700;
        }

        .py-6 {
            padding-top: 1.5rem;
            padding-bottom: 1.5rem;
        }

        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border-radius: 8px;
        }

        .header {
            background-color: #f9fafb;
            padding: 10px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }

        .footer {
            text-align: center;
            padding: 10px;
            font-size: 0.875rem;
        }
    </style>
</head>

<body class="bg-gray-100">
    <div class="container bg-white shadow-md">
        <div class="header">
            <h1 class="text-2xl font-bold text-gray-800">¡Bienvenido a SG Envios Nacionales!</h1>
        </div>

        <div class="content py-6">
            <p class="text-gray-700">Hola, <strong>{{ $usuario->nombre }} {{ $usuario->apellido }}</strong>,</p>
            <p class="text-gray-700">Gracias por registrarte en nuestro sistema. Estamos encantados de tenerte a bordo.</p>
            <p class="text-gray-700">Si tienes alguna pregunta o necesitas ayuda, no dudes en <a href="mailto:napovisa@gmail.com" class="text-blue-500">contactarnos</a>.</p>
            <p class="text-gray-700">¡Disfruta de tu experiencia en SG Envios Nacionales!</p>
        </div>

        <div class="footer">
            <p class="text-gray-600">&copy; {{ date('Y') }} SG Envios Nacionales. Todos los derechos reservados.</p>
        </div>
    </div>
</body>

</html>