@extends('dashboard.admin')    
@section('content')   
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
<link rel="stylesheet" href="{{ asset('css/productos_admin.css') }}">

    <h2>Listado de Servicios</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Descripción</th>
                <th>Imagen</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($servicios as $servicio)
            <tr>
                <td>{{ $servicio->id }}</td>
                <td>{{ $servicio->nombre }}</td>
                <td>${{ number_format($servicio->precio, 0, ',', '.') }}</td>
                <td>{{ $servicio->descripcion }}</td>
                <td>
                    @if ($servicio->imagen)
                        <img src="{{ asset('storage/'.$servicio->imagen) }}" alt="Imagen" width="80">
                    @else
                        <span class="text-muted">Sin imagen</span>
                    @endif
                </td>
                <td>
                    <a href="{{ route('servicio.edit', $servicio->id) }}">Editar</a>
                    
                    <form action="{{ route('servicio.destroy', $servicio->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
     <a href="{{ route('producto.create') }}" class="btn btn-primary">Crear</a>
</div>
@endsection
