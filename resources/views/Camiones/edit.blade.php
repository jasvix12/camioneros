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

<h1>Editar Camion</h1>
    <form action="{{ route('camiones.update', $camion->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="potencia">Potencia:</label>
            <input type="number" name="potencia" id="potencia" class="form-control" value="{{ $camion->potencia }}" required>
        </div>
        <div class="form-group">
            <label for="matricula">Matrícula:</label>
            <input type="text" name="matricula" id="matricula" class="form-control" value="{{ $camion->matricula }}" required>
        </div>
        <div class="form-group">
            <label for="modelo">Modelo:</label>
            <input type="text" name="modelo" id="modelo" class="form-control" value="{{ $camion->modelo }}" required>
        </div>
        <div class="form-group">
            <label for="tipo">Tipo:</label>
            <input type="text" name="tipo" id="tipo" class="form-control" value="{{ $camion->tipo }}" required>
        </div>
        <button type="submit" class="btn btn-primary">Actualizar</button>
    </form>
@endsection
</body>
</html>