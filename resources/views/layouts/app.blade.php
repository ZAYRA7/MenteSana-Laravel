<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MenteSana - @yield('title')</title>

    <!-- Bootstrap 5 CSS CDN (¡Esto es lo que faltaba!) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Google Fonts Roboto -->
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    
    <style>
        body { 
            font-family: 'Roboto', sans-serif; 
            background-color: #FAFAFC; 
        }
        .navbar-custom { 
            background-color: #4A2E80; /* Morado oficial */
        }
        .footer-custom { 
            background-color: #1a1333; 
            color: white; 
        }
    </style>
</head>
<body class="d-flex flex-column min-vh-100">

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm mb-4 py-3">
        <div class="container">
            <a class="navbar-brand text-white fw-bold d-flex align-items-center gap-2" href="{{ url('/') }}">
                🧠 MenteSana
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMain">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMain">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('citas.index') }}">Lista de Citas</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" href="{{ route('citas.create') }}">Agendar Cita</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- CONTENIDO PRINCIPAL -->
    <main class="container flex-grow-1">
        <!-- Mensajes de éxito/error -->
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
    </main>

    <!-- FOOTER -->
    <footer class="footer-custom mt-auto py-4 text-center">
        <div class="container">
            <p class="mb-1 fw-bold">🧠 MenteSana</p>
            <p class="small text-muted mb-0" style="color: #c4b8e8 !important;">Proyecto en equipo — Aplicaciones Web 2026</p>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle (¡Necesario para que funcione el menú de hamburguesa!) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>