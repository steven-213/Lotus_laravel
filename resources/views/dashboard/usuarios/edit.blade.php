<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar usuario</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/boton.css') }}">
</head>
<body class="container mt-5">

    <h1>Editar usuario</h1>

    {{-- Mostrar errores de validación --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuario.update', $usuario->id) }}" method="POST" class="mt-3">
        @method('PATCH')
        @csrf

        <div class="mb-3">
            <label for="name" class="form-label">Nombre :</label>
            <input type="text" 
                name="name" 
                id="name" 
                value="{{ old('name', $usuario->name) }}" 
                class="form-control" 
                required>
            @error('name')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo electrónico :</label>
            <input type="email" 
                name="email" 
                id="email" 
                value="{{ old('email', $usuario->email) }}" 
                class="form-control" 
                required>
            @error('email')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="role" class="form-label">Rol :</label>
            <select name="role" id="role" class="form-control" required>
                <option value="admin" {{ old('role', $usuario->role) === 'admin' ? 'selected' : '' }}>Admin</option>
                <option value="user" {{ old('role', $usuario->role) === 'user' ? 'selected' : '' }}>Usuario</option>
            </select>
            @error('role')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        {
        <div class="mb-3">
            <label for="password" class="form-label">Contraseña (opcional) :</label>
            <input type="password" 
                name="password" 
                id="password" 
                class="form-control" 
                placeholder="Deja en blanco para no cambiar">
            @error('password')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('usuario.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

</body>
</html>
