<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Laravel - Estado</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 text-gray-800 flex items-center justify-center h-screen">
    <div class="bg-white p-10 rounded shadow-lg text-center max-w-md mx-auto">
        <h1 class="text-3xl font-bold {{ $success ? 'text-green-600' : 'text-red-600' }} mb-4">
            {{ $success ? '¡Conexión Exitosa!' : 'Error de Conexión' }}
        </h1>

        <p class="text-lg">{!! $message !!}</p>

        <div class="mt-6 text-sm text-gray-600">
            <p>Verificación desde Laravel Render App.</p>
            <p class="mt-1">Archivo: <code>welcome.blade.php</code></p>
        </div>
    </div>
</body>
</html>
