<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Lotus Dream Spa') }}</title>
    <link rel="icon" href="{{ asset('favicon.png') }}" type="image/png">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
</head>
<body class="font-sans antialiased">
    <!-- Header -->
    <header id="header">
        <nav class="container nav-container">
            <a class="logo" href="{{ url('/') }}">
                <img src="{{ asset('img/logo.png') }}" alt="Lotus Dream Spa" width="100px">
            </a>
            <ul class="items_ul">
                <li class="nav-item"><a class="nav-link" href="{{ url('/conocenos') }}">Conócenos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/servicios') }}">Servicios</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/productos') }}">Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Inicia Sesión</a></li>
            </ul>
        </nav>
    </header>

    <!-- Contenido dinámico -->
    <main class="container">
        {{ $slot }}
    </main>

    <!-- Footer -->
    <footer id="footer">
        <div class="container">
            <p>&copy; 2025 Lotus Dream Spa. Todos los derechos reservados.</p>
            <ul class="social-media">
                <li><a href="#"><img src="{{ asset('icons/facebook.png') }}" alt="Facebook" width="50px"></a></li>
                <li><a href="#"><img src="{{ asset('icons/instagram.png') }}" alt="Instagram" width="50px"></a></li>
                <li><a href="#"><img src="{{ asset('icons/x.png') }}" alt="Twitter" width="50px"></a></li>
            </ul>
        </div>
    </footer>
</body>
</html>
