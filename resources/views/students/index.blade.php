<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lista de Estudiantes</title>
        @vite('resources/css/app.css')
    </head>

<body>
    
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="mb-4">
                    <a href="{{ route('students.create') }}" class="text-white bg-blue-500 hover:bg-blue-700 px-4 py-2 rounded">Crear Estudiante</a>
                </div>

                @if (session('success'))
                <div class="mb-4 p-4 bg-green-100 text-green-800 rounded">
                    {{ session('success') }}
                </div>
                @endif

                <table class="table-auto w-full">
                    <thead>
                        <tr>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ID</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">NOMBRE</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">EDAD</th>
                            <th class="px-4 py-2 text-gray-900 dark:text-white text-center">ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($students as $student)
                        <tr>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $student->id }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $student->name }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">{{ $student->age }}</td>
                            <td class="border px-4 py-2 text-gray-900 dark:text-white text-center">
                                <a href="{{ route('students.edit', $student->id) }}" class="text-blue-600 hover:text-blue-900">Editar</a>
                                <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline-block">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>