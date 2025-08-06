<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Laravel - Conexión Exitosa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @vite('resources/css/app.css') <!-- Solo si estás usando Vite y Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 flex items-center justify-center h-screen">
    <div class="bg-white p-10 rounded shadow-lg text-center max-w-md mx-auto">
        <h1 class="text-3xl font-bold text-green-600 mb-4">¡Laravel desplegado exitosamente!</h1>

        @php
            try {
                \DB::connection()->getPdo();
                $dbName = \DB::connection()->getDatabaseName();
                $status = "Conexión a la base de datos <strong>$dbName</strong> exitosa";
            } catch (\Exception $e) {
                $status = "Error de conexión a la base de datos <br><code>" . $e->getMessage() . "</code>";
            }
        @endphp

        <p class="text-lg">{!! $status !!}</p>

        <div class="mt-6 text-sm text-gray-600">
            <p>Aplicación ejecutándose desde Render.</p>
            <p class="mt-1">Edita este archivo en <code>resources/views/welcome.blade.php</code></p>
        </div>
    </div>
</body>
</html>
