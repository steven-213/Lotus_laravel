        
        
        <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Precio</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>   
                </tr>
            </thead>
        <tbody>
    @foreach ($productos as $producto)
    <tr>
        <td>{{ $producto->id }}</td>
        <td>{{ $producto->nombre }}</td>
        <td>{{ (int) $producto->precio }}</td>
        <td>{{ $producto->descripcion }}</td>
        <td>
            <a href="{{ route('producto.edit', $producto->id) }}">Editar</a>
            
            <form action="{{ route('producto.destroy', $producto->id) }}" method="POST" style="display:inline">
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
