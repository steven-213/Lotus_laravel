@extends('layouts.app_lotus')

@section('content')

<div class="conocenos-container">
    <h2 class="titulo-seccion">🌸 Conócenos 🌸</h2>

    <div class="conocenos-intro">
        <div class="intro-texto">
            <p>
                En <strong>Lotus Dream Spa</strong> nos especializamos en brindarte un espacio de relajación, 
                bienestar y belleza. Nuestro compromiso es ofrecer experiencias únicas que combinen 
                tradición, innovación y un servicio de calidad.
            </p>
            <p>
                Creemos en el cuidado integral del cuerpo y la mente, por eso cada detalle 
                está pensado para que disfrutes de un momento especial.
            </p>
        </div>
        <div class="intro-imagen">
            <img src="{{ asset('img/spa.jpg') }}" alt="Spa Lotus Dream">
        </div>
    </div>

    <div class="conocenos-valores">
        <div class="valor-card">
            <img src="{{ asset('icons/cuidado.png') }}" alt="Cuidado">
            <h4>Cuidado Personalizado</h4>
            <p>Tratamientos adaptados a tus necesidades y estilo de vida.</p>
        </div>
        <div class="valor-card">
            <img src="{{ asset('icons/calidad.png') }}" alt="Calidad">
            <h4>Calidad y Confianza</h4>
            <p>Utilizamos productos de alta gama y profesionales certificados.</p>
        </div>
        <div class="valor-card">
            <img src="{{ asset('icons/relax.png') }}" alt="Relajación">
            <h4>Ambiente de Relajación</h4>
            <p>Un espacio pensado para desconectar y renovar tus energías.</p>
        </div>
    </div>
</div>

@endsection
<link rel="stylesheet" href="{{ asset('css/conocenos.css') }}">