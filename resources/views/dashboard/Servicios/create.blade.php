
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
    <!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>
    <div>
        <form action="{{route('students.store')}}" method="POST">
            @csrf
            <div>
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" required>
            </div>
            <div>
                <label for="name">Apellido</label>
                <input type="text" name="last_name" id="name" required>
            </div>
            <div>
                <label for="age">Edad:</label>
                <input type="number" name="age" id="age" required>
            </div>
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>