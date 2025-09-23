@extends('layouts.app_lotus')

@section('content')
<link rel="stylesheet" href="{{ asset('css/productos.css') }}">

<div class="productos-container">
    <h2 class="titulo-seccion">✨ Nuestros Productos ✨</h2>

    <div class="grid-productos">
        @foreach ($productos as $producto)
            <div class="producto-card">
                <img src="{{ asset('storage/' . $producto->imagen) }}" alt="Imagen del producto">
                <div class="producto-info">
                    <h5 class="producto-nombre">{{ $producto->nombre }}</h5>
                    <p class="producto-precio">${{ number_format($producto->precio, 0, ',', '.') }}</p>
                    <p class="producto-desc">{{ $producto->descripcion }}</p>
                    <button class="btn-agregar">Agregar al carrito</button>
                </div>
            </div>
        @endforeach
    </div>
</div>

@endsection
