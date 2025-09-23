        
        
        <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

        <a href="{{route('producto.create')}}">crear</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Edad</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productos as $producto)
                <tr>
                    <td>{{$producto->id}}</td>
                    <td>{{$producto->name}}</td>
                    <td>{{$producto->last_name}}</td>
                    <td>{{$producto->age}}</td>
                    <td>
                        <a href="{{route('producto.edit', $producto->id)}}">Editar</a>
                        <form action="{{route('producto.destroy', $producto->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <form action="{{route('students.destroy', $producto->id)}}">
                            <button type="submit">Elimina</button>
                            </form>
                        </form>
                    </td>
                </tr> 
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('producto.create') }}" class="btn btn-primary">Create</a>
