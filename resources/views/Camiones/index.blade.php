<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @extends('layout')

@section('content')
    <h1>Lista de Camiones</h1>
    <a href="{{ route('camiones.create') }}" class="btn btn-primary">Crear Camion</a>
    <ul class="list-group mt-3">
        @foreach($camiones as $camion)
            <li class="list-group-item">
                <a href="{{ route('camiones.show', $camion->id) }}">{{ $camion->matricula }}</a>
                <a href="{{ route('camiones.edit', $camion->id) }}" class="btn btn-secondary btn-sm">Editar</a>
                <form action="{{ route('camiones.destroy', $camion->id) }}" method="POST" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                </form>
            </li>
        @endforeach
    </ul>
@endsection

</body>
</html>