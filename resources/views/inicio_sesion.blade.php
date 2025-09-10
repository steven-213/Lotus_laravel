@extends('layouts.app_lotus')
@section('contenido')
    <link rel="stylesheet" href="{{ asset('css/inicio_sesion.css') }}">

    <button onclick="window.history.back()">Volver</button>

    <!-- Formulario separado -->
    <form action="" id="inicioSesion" method="post">
        <div class="cajaprincipal">
            <p>Inicia Sesion</p>
            <input type="email" name="email" id="email" required placeholder="Introduce tu email">
            <input type="password" name="password" id="password" required placeholder="Introduce tu contraseña"> 
            <a href="../errores/500.html">Olvide mi contraseña</a>
            <br>
            <button id="accede" type="submit">Acceder</button>
            <br><br>
            <a href="registro.php">Registrate</a>
        </div>
    </form>
@endsection

