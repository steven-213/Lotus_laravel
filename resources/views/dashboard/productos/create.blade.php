
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('producto.store') }}" method="POST" enctype="multipart/form-data">
    @csrf

    <div class="mb-3">
        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" value="{{ old('nombre') }}" class="form-control">
        @error('nombre')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="precio">Precio</label>
        <input type="number" name="precio" value="{{ old('precio') }}" class="form-control">
        @error('precio')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3">
        <label for="descripcion">Descripción</label>
        <textarea name="descripcion" class="form-control">{{ old('descripcion') }}</textarea>
        @error('descripcion')
            <small class="text-danger">{{ $message }}</small>
        @enderror
    </div>
    <div class="mb-3">
        <label for="imagen">Imagen del producto</label>
        <input type="file" name="imagen" class="form-control">
    </div>

    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

</html>