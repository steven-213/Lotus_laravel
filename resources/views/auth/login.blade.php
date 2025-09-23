@extends('layouts.app_lotus')

@section('content')
<link rel="stylesheet" href="{{ asset('css/login.css') }}">

<div class="login-container">
    <h2 class="titulo-seccion">Iniciar Sesión</h2>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    <form method="POST" action="{{ route('login') }}" class="login-form">
        @csrf

        <!-- Email -->
        <div class="form-group">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="input-field" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="error-text" />
        </div>

        <!-- Password -->
        <div class="form-group">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="input-field" type="password" name="password" required autocomplete="current-password" />
            <x-input-error :messages="$errors->get('password')" class="error-text" />
        </div>

        <!-- Remember Me -->
        <div class="form-remember">
            <label for="remember_me" class="checkbox-label">
                <input id="remember_me" type="checkbox" class="checkbox" name="remember">
                <span>{{ __('Recordarme') }}</span>
            </label>
        </div>

        <!-- Acciones -->
        <div class="form-actions">
            @if (Route::has('password.request'))
                <a class="link" href="{{ route('password.request') }}">
                    {{ __('¿Olvidaste tu contraseña?') }}
                </a>
            @endif

            <button type="submit" class="btn-login">
                {{ __('Ingresar') }}
            </button>
        </div>
    </form>

    <!-- Botón para registrar -->
    <form action="{{ route('register') }}" method="GET" class="register-form">
        <button type="submit" class="btn-register">Crear cuenta</button>
    </form>
</div>
@endsection
