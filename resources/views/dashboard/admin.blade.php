<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Panel de Administración</title>
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>

<body>

    <!-- NAV -->
    <nav class="admin-nav">
        <div class="nav-left">
            <img src="{{ asset('img/logo.png') }}" alt="Logo" class="logo">
            <h1>Panel de Administración</h1>
        </div>
        <div class="nav-right">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn-logout">🚪 Cerrar sesión</button>
            </form>
        </div>
    </nav>

    <!-- GRID DE BOTONES -->
    <div class="admin-grid">
        <button class="admin-card" onclick="window.location.href='{{route('producto_dashboard.index')}}'">
            📦 <span>Productos</span>
        </button>

        <button class="admin-card" onclick="window.location.href='{{route('servicio_dashboard.index')}}'">
            🛠️ <span>Servicios</span>
        </button>

        <button class="admin-card" onclick="window.location.href='{{route('calendar.index')}}'">
            📅 <span>Calendario</span>
        </button>
        <button class="admin-card" onclick="window.location.href='{{route('usuario.index')}}'">
            👥 <span>Usuarios</span>
        </button>
        
    </div>

    <!-- CONTENIDO DINÁMICO -->
    <div class="admin-content" id="admin-content">
        @yield('content')
    </div>

</body>

</html>
