<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>PayLab</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-gray-100">

    <nav class="bg-white shadow p-4 flex justify-between">
        <h1 class="font-bold text-xl">PayLab 🎁</h1>

        <div>
            <a href="{{ route('giftcards.index') }}" class="mr-4">Gift Cards</a>
            <a href="{{ route('pedidos.index') }}">Meus pedidos</a>
        </div>
    </nav>

    <main class="p-6">
        @yield('content')
    </main>

</body>
</html>
