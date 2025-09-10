<link rel="stylesheet" href="{{ asset('css/registro.css') }}">
<form method="POST" action="{{ route('register') }}" id="registroForm" onsubmit="return boton()">
    @csrf

    <div class="cajaprincipal">
        <p>Regístrate</p>

        <!-- Nombre -->
        <span>Introduce tu Nombre</span>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required placeholder="">
        @error('name')
            <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror

        <!-- Email -->
        <span>Introduce tu Email</span>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required placeholder="">
        @error('email')
            <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror

        <!-- Contraseña -->
        <span>Introduce tu Contraseña</span>
        <input type="password" name="password" id="password" required placeholder="">
        @error('password')
            <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror

        <!-- Confirmar Contraseña -->
        <span>Confirma tu Contraseña</span>
        <input type="password" name="password_confirmation" id="password_confirmation" required placeholder="">
        @error('password_confirmation')
            <div class="text-red-500 text-sm">{{ $message }}</div>
        @enderror

        <br>
        <button id="crea" type="submit">Crea tu Cuenta</button>
    </div>
</form>
