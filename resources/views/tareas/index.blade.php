@extends('welcome')
@section('content')
    <!DOCTYPE html>
<html>
<head>
    <title>Tareas de Mantenimiento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">Lista de Tareas de Mantenimiento</h1>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif

            <a href="{{ route('tareas_mantenimientos.create') }}" class="btn btn-primary mb-3">Crear Nueva Tarea</a>

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                <tr>
                    <th>Descripción</th>
                    <th>Fecha Programada</th>
                    <th>Realizada</th>
                    <th>Mantenimiento</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($tareas as $tarea)
                    <tr>
                        <td>{{ $tarea->descripcion }}</td>
                        <td>{{ $tarea->fecha_programada }}</td>
                        <td>{{ $tarea->fecha_realizada }}</td>
                        <td>{{ $tarea->mantenimiento->ID_Mantenimiento ?? 'No asignado' }}</td> <!-- Asumiendo que el nombre del mantenimiento es 'nombre' -->
                        <td>
                            <a href="{{ route('tareas_mantenimientos.edit', $tarea->ID_Tarea_Mantenimiento) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('tareas_mantenimientos.destroy', $tarea->ID_Tarea_Mantenimiento) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
