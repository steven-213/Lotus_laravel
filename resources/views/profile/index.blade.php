@extends('layouts.app_lotus')
@section('content')
<link rel="stylesheet" href="{{ asset('css/perfil.css') }}">
<x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        {{ __('Profile') }}
    </h2>
</x-slot>

<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">

        <!-- Actualizar información de perfil -->
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <form method="post" action="{{ route('profile.update') }}" class="space-y-6">
                @csrf
                @method('patch')

                <!-- Nombre -->
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" name="name" type="text" class="mt-1 block w-full"
                        :value="old('name', $user->name)" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email -->
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" name="email" type="email" class="mt-1 block w-full"
                        :value="old('email', $user->email)" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />

                    @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                        <p class="text-sm mt-2 text-gray-800">
                            {{ __('Your email address is unverified.') }}
                            <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900">
                                {{ __('Click here to re-send the verification email.') }}
                            </button>
                        </p>

                        @if (session('status') === 'verification-link-sent')
                            <p class="mt-2 font-medium text-sm text-green-600">
                                {{ __('A new verification link has been sent to your email address.') }}
                            </p>
                        @endif
                    @endif
                </div>

                <x-primary-button>{{ __('Save') }}</x-primary-button>
                @if (session('status') === 'profile-updated')
                    <p x-data="{ show: true }" x-show="show" x-transition
                        x-init="setTimeout(() => show = false, 2000)" class="text-sm text-gray-600">
                        {{ __('guardado.') }}
                    </p>
                @endif
            </form>

            <!-- Form para enviar verificación de email -->
            <form id="send-verification" method="post" action="{{ route('verification.send') }}">
                @csrf
            </form>
        </div>

        <!-- Eliminar cuenta -->
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <form method="POST" action="{{ route('profile.destroy') }}">
                @csrf
                @method('delete')
                <div>
                    <x-input-label for="password" :value="__('Confirm your password')" />
                    <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"
                        required placeholder="{{ __('Password') }}" />
                    <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
                </div>

                <x-danger-button class="mt-4" onclick="return confirm('¿Estás seguro de eliminar tu cuenta?')">
                    {{ __('Eliminar cuenta') }}
                </x-danger-button>
            </form>
        </div>

        <!-- Cerrar sesión -->
        <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="bg-gray-700 text-white px-4 py-2 rounded">
                    {{ __('Cerrar sesión') }}
                </button>
            </form>
        </div>

    </div>
</div>
@endsection
