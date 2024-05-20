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
    <h1>Detalle del Camion</h1>
    <p><strong>Potencia:</strong> {{ $camion->potencia }}</p>
    <p><strong>Matrícula:</strong> {{ $camion->matricula }}</p>
    <p><strong>Modelo:</strong> {{ $camion->modelo }}</p>
    <p><strong>Tipo:</strong> {{ $camion->tipo }}</p>
    <a href="{{ route('camiones.edit', $camion->id) }}" class="btn btn-secondary">Editar</a>
    <form action="{{ route('camiones.destroy', $camion->id) }}" method="POST" style="display:inline;">
        @csrf
        @method('DELETE')
        <button type="submit" class="btn btn-danger">Eliminar</button>
    </form>
@endsection

</body>
</html>