@extends('layouts.app_lotus')
@section('content')

<link rel="stylesheet" href="{{asset('css/index.css')}}" />
<div class="cajaprincipal">
        <section class="hero">
            <div class="container">
                <h1>Bienvenido a Lotus Dream Spa</h1>
                <p>Descubre una experiencia única de relajación y bienestar.</p>
                <a href="#11" class="btn">Conoce nuestros servicios</a>
            </div>
        </section>

        <section id="servicios" class="services">
            <div class="container">
                <h2> Estamos ubicados en <strong>Carrera 7 #128 - 45</strong>. ¡Te esperamos! </h2>
                <div class="service-list">
                    <div class="service-item">
                        <img src="{{asset('img/index/local.webp')}}" alt=" Imagen" width="40%" />

                        <p>Relaja tu cuerpo y mente con nuestras técnicas especializadas.</p>
                    </div>
                    <div class="service-item">
                        <img src="{{asset('img/index/instalacion.jpg')}}" alt=" Imagen" width="40%" />

                        <p>Con nuestras excelentes instalaciones, sientente como en casa.</p>

                    </div>
        </section>

        <!-- Servicios destacados -->
        <section id="servicios" class="services">
            <div class="container">
                <h2 id="11">Servicios Destacados</h2>
                <div class="service-list">
                    <div class="service-item">
                        <img src="{{asset('img/index/masaje.jpg')}}" alt="Masajes Corporales" />
                        <h3>Masajes Corporales</h3>
                        <p>Relaja tu cuerpo y mente con nuestras técnicas especializadas.</p>
                    </div>
                    <div class="service-item">
                        <img src="{{asset('img/index/faciales.png')}}" alt="Faciales" />
                        <h3>Faciales</h3>
                        <p>Cuida y revitaliza tu piel con tratamientos personalizados.</p>
                    </div>
                    <div class="service-item">
                        <img src="{{asset('img/index/pestañas.jpg')}}" alt="Pestañas" />
                        <h3>Pestañas</h3>
                        <p>Realza tu mirada con nuestras extensiones y lifting de pestañas.</p>
                    </div>
                </div>
            </div>
        </section>:


        <!-- Productos destacados -->
        <section id="productos" class="products">
            <div class="container">
                <h2>Productos Destacados</h2>
                <div class="product-list">
                    <div class="product-item">
                        <img src="{{asset('img/Productos/MatizantesBukiPro.jpg')}}" alt="MatizantesBukiPro" />
                        <h3>Matizantes Buki Pro</h3>
                        <p>Especializado para tu pelo y cuidartelo.</p>
                    </div>
                    <div class="product-item">
                        <img src="{{asset('img/Productos/MantequillasHidratantesArtesanalesfrutosrojos.jpg')}}" alt="Mantequillas Corporales" />
                        <h3>Mantequillas Hidratantes Artesanales frutos rojos</h3>
                        <p>Hidrata tu piel con nuestras mantequillas naturales.</p>
                    </div>
                    <div class="product-item">
                        <img src="{{asset('img/Productos/serum.jpg')}}" alt="Serum Facial" />
                        <h3>Serum Facial</h3>
                        <p>Revitaliza tu rostro con nuestros serums especializados.</p>
                    </div>
                </div>
            </div>
        </section>

        <!-- Promociones -->
        <section id="promociones" class="promotions">
            <div class="container">
                <h2>Promociones</h2>
                <div class="promotion-list">
                    <div class="promotion-item">
                        <img src="{{asset('img/Promociones/Promocion.jpg')}}" alt="Promoción 1" />
                        <h3>Descuento en Masajes</h3>
                        <p>15% de descuento en masajes corporales durante este mes.</p>
                    </div>
                    <div class="promotion-item">
                        <img src="{{asset('img/Promociones/Promocion.jpg')}}" alt="Promoción 2" />
                        <h3>Combo Facial + Manicura</h3>
                        <p>Aprovecha nuestro combo especial para consentirte.</p>
                    </div>
                </div>
            </div>
        </section>
        <!-- Horarios de Atención -->
        <section id="horarios" class="horarios">
            <div class="container">
                <h2>Horarios de Atención</h2>
                <table class="tabla-horarios">
                    <thead>
                        <tr>
                            <th>Día</th>
                            <th>Horario</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Lunes a Viernes</td>
                            <td>10:00 AM - 6:00 PM</td>
                        </tr>
                        <tr>
                            <td>Sábados</td>
                            <td>10:00 AM - 8:00 PM</td>
                        </tr>
                        <tr>
                            <td>Domingos y Festivos</td>
                            <td>Cerrado</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </section>
    </div>  
    @endsection