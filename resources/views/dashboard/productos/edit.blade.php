<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar producto</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/boton.css') }}">
</head>
<body class="container mt-5">

    <h1>Editar producto</h1>

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

    <form action="{{ route('producto.update', $producto->id) }}" method="POST" enctype="multipart/form-data" class="mt-3">
        @method('PATCH')
        @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre :</label>
            <input type="text" 
                name="nombre" 
                id="nombre" 
                value="{{ old('nombre', $producto->nombre) }}" 
                class="form-control" 
                required>
            @error('nombre')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio :</label>
            <input type="number" 
                name="precio" 
                id="precio" 
                value="{{ old('precio',(int) $producto->precio) }}" 
                class="form-control" 
                required>
            @error('precio')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción :</label>
            <textarea name="descripcion" 
                    id="descripcion" 
                    class="form-control" 
                    required>{{ old('descripcion', $producto->descripcion) }}</textarea>
            @error('descripcion')
                <small class="text-danger">{{ $message }}</small>
            @enderror
        </div>
        <div class="mb-3">
        <label for="imagen">Imagen del producto</label>
        <input type="file" name="imagen" class="form-control">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a href="{{ route('producto_dashboard.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>

</body>
</html>
