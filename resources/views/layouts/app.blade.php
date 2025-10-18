<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ITCA SKILLS 2025 - @yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#0B1E28]">
    <nav class="bg-[#07212C] border-b border-[#00C8FF] p-4 shadow-lg">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-xl font-bold text-[#FFD33D]">ITCA SKILLS 2025 Admin</h1>
            <div class="space-x-4">
                <a href="{{ route('preguntas.index') }}" class="text-[#A8C3C7] hover:text-[#FFD33D] transition-colors font-medium">Preguntas</a>
                <a href="{{ route('juego.index') }}" class="text-[#A8C3C7] hover:text-[#FFD33D] transition-colors font-medium">Jugar</a>
            </div>
        </div>
    </nav>

    <main class="container mx-auto mt-6 p-4">
        @if(session('success'))
            <div class="bg-[#07212C] border border-[#4CAF50] text-[#4CAF50] px-4 py-3 rounded mb-4 shadow-md">
                {{ session('success') }}
            </div>
        @endif

        @if(session('error'))
            <div class="bg-[#07212C] border border-[#FF4040] text-[#FF4040] px-4 py-3 rounded mb-4 shadow-md">
                {{ session('error') }}
            </div>
        @endif

        @yield('content')
    </main>
</body>
</html>