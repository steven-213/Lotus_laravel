@extends('layouts.app_lotus')

@section('content')
<link rel="stylesheet" href="{{ asset('css/productos.css') }}">

<div class="productos-container">
    <h2 class="titulo-seccion">💅 Nuestros Servicios 💅</h2>

    <div class="grid-productos">
        @forelse ($servicios as $servicio)
        <div class="producto-card">
            <img src="{{ asset('storage/' . $servicio->imagen) }}" alt="Imagen del servicio">
            <div class="producto-info">
                <h5 class="producto-nombre">{{ $servicio->nombre }}</h5>
                <p class="producto-precio">${{ number_format($servicio->precio, 0, ',', '.') }}</p>
                <p class="producto-desc">{{ $servicio->descripcion }}</p>

                <button type="submit" class="btn-agregar">Agendar cita</button>
            </div>
        </div>
        @empty
        <p class="text-center">🚨 No hay servicios disponibles por ahora.</p>
        @endforelse
    </div>
</div>
@endsection
