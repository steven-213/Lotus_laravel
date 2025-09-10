@extends('layouts.app')

@section('contenido')
Lista de productos en la base de datos:
<table class="table">
<thead>
    <tr>
        <th>ID</th>
        <th>Nombre</th>
        <th>Precio</th>
        <th>Descripción</th>
    </tr>
</thead>
<tbody>
@foreach ($productos as $producto)
    <tr>
        <td>{{$producto->id}}</td>
        <td>{{$producto->nombre}}</td>
        <td>{{$producto->precio}}</td>
        <td>{{$producto->descripcion}}</td>
    </tr>
@endforeach
</tbody>
</table>

@endsection

