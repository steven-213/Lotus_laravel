<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear usuario</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/boton.css') }}">
</head>
<body class="container py-5">

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('usuario.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="name">Nombre</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control">
        @error('name')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="email">Correo</label>
        <input type="email" name="email" value="{{ old('email') }}" class="form-control">
        @error('email')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="password">Contraseña</label>
        <input type="password" name="password" class="form-control">
        @error('password')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="role">Rol</label>
        <select name="role" class="form-control">
            <option value="">-- Selecciona un rol --</option>
            <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Administrador</option>
            <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>Usuario</option>
        </select>
        @error('role')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>


</body>
</html>
