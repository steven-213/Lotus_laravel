<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>create</title>
</head>
<body>
    <div>
        <form action="{{route('students.update',$student->id)}}" method="POST">
            @method('PUT')
            @csrf
            <div>
                <label for="name">Nombre:</label>
                <input type="text" name="name" id="name" value="{{$student->name}}" required>
            </div>
            <div>
                <label for="last_name">Apellido</label>
                <input type="text" name="last_name" id="last_name" value="{{$student->last_name}}" required>
            </div>
            <div>
                <label for="age">Edad:</label>
                <input type="number" name="age" id="age" value="{{$student->age}}"required>
            </div>
            <button type="submit">Guardar</button>
        </form>
    </div>
</body>
</html>