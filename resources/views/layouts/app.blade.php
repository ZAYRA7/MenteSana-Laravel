<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mente Sana - @yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body>
    <nav class="navbar navbar-expand-lg shadow-sm mb-4" style="background-color: #4A90A4;">
        <div class="container">
            <a class="navbar-brand text-white fw-bold" href="{{ url('/') }}">
                🧠 Mente Sana
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/') }}">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/citas') }}">Citas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ url('/citas/create') }}">Agendar Cita</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container">
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @if(session('error'))
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        @yield('content')
    </div>

    <footer class="mt-5 py-4" style="background-color: #F0F8FA;">
        <div class="container text-center">
            <p class="mb-1 fw-bold" style="color: #4A90A4;">🧠 Mente Sana</p>
            <p class="small text-muted mb-0">Proyecto en equipo — Aplicaciones Web 2026</p>
        </div>
    </footer>
</body>
</html>
