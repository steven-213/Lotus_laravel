@extends('dashboard.admin')    
@section('content')       
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/usuario.css') }}">

    <h2 class="mb-4">Lista de Usuarios</h2>

    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Fecha de registro</th>
                <th>Fecha de actualizado</th> 
                <th>Rol</th>  
                <th>Accion</th>    
            </tr>
        </thead>
        <tbody>
            @foreach ($usuarios as $usuario)
                <tr>
                    <td>{{ $usuario->id }}</td>
                    <td>{{ $usuario->name }}</td>
                    <td>{{ $usuario->email }}</td>
                    <td>{{ $usuario->created_at->format('d/m/Y') }}</td>
                    <td>{{ $usuario->updated_at->format('d/m/Y')}}</td>
                    <td>{{ $usuario->role}}</td>
                    <td>
                        <a href="{{ route('usuario.edit', $usuario->id) }}" class="btn btn-sm btn-warning">Editar</a>
                        
                        <form action="{{ route('usuario.destroy', $usuario->id) }}" method="POST" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-sm btn-danger">Eliminar</button>
                        </form>
                    </td>
                </tr> 
            @endforeach
        </tbody>
    </table>

    <a href="{{ route('usuario.create') }}" class="btn btn-primary">Crear usuario</a>
@endsection
