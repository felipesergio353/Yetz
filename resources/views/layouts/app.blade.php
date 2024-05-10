<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Adicione aqui seus estilos CSS, scripts JS, etc. -->
</head>
<body>
    <header>
        <!-- Aqui vai o cabeçalho comum -->
        <h1>{{ config('app.name', 'Laravel') }}</h1>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <!-- Aqui vai o rodapé comum -->
        <p>&copy; {{ date('Y') }} {{ config('app.name', 'Laravel') }}</p>
    </footer>
</body>
</html>