<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Lotus Dream Spa</title>
    <link rel="icon" href="{{asset('favicon.png')}}" type="image/png">
    <link rel="stylesheet" href="{{asset('css/layout.css')}}" />
</head>

<body>
    <!-- Header -->
    <header id="header">
        <nav class="container nav-container">
            <a class="logo" href="">
                <img src="{{asset('img/logo.png')}}" alt="Lotus Dream Spa" height="px" width="100px" />
            </a>
            <!--ORIGINAL-->
            <ul class="items_ul">
                <li class="nav-item"><a class="nav-link" href="{{ route('nosotros.index') }}">Conócenos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ url('/servicios') }}">Servicios</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('producto.index') }}">Productos</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('login') }}">Inicia Sesión</a></li>
            </ul>


        </nav>

    </header>



    <!-- Secciones principales -->

    @yield('content')




    <!-- footer -->
    <footer id="footer">
        <footer class="footer">
            <div class="container">
                <p>&copy; 2025 Lotus Dream Spa. Todos los derechos reservados.</p>
                <ul class="social-media">
                    <li><a href="#"><img src="{{asset('icons/facebook.png')}}" alt="Facebook" height="px" width="50px" /></a></li>
                    <li><a href="#"><img src="{{asset('icons/instagram.png')}}" alt="Instagram" height="px" width="50px" /></a></li>
                    <li><a href="#"><img src="{{asset('icons/x.png')}}" alt="Twitter" height="px" width="50px" /></a></li>
                </ul>
            </div>
            </div>
</body>

</html>