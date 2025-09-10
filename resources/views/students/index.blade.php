@extends('layouts.app')
@section('contenido')
        <a href="{{route('students.create')}}">crear</a>
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
                @foreach ($students as $student)
                <tr>
                    <td>{{$student->id}}</td>
                    <td>{{$student->name}}</td>
                    <td>{{$student->last_name}}</td>
                    <td>{{$student->age}}</td>
                    <td>
                        <a href="{{route('students.edit', $student->id)}}">Editar</a>
                        <form action="{{route('students.destroy', $student->id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <form action="{{route('students.destroy', $student->id)}}">
                            <button type="submit">Elimina</button>
                            </form>
                        </form>
                    </td>
                </tr> 
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('students.create') }}" class="btn btn-primary">Create</a>


@endsection
