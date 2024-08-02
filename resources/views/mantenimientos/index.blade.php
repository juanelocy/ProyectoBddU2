@extends('welcome')

@section('content')

    <!DOCTYPE html>
<html>
<head>
    <title>Mantenimientos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">Lista de Mantenimientos</h1>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif

            <a href="{{ route('mantenimientos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Mantenimiento</a>

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                <tr>
                    <th>Fecha</th>
                    <th>Descripción</th>
                    <th>Estado</th>
                    <th>Puesto</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($mantenimientos as $mantenimiento)
                    <tr>
                        <td>{{ $mantenimiento->Fecha }}</td>
                        <td>{{ $mantenimiento->Descripción }}</td>
                        <td>{{ $mantenimiento->Estado }}</td>
                        <td>{{ $mantenimiento->puesto->Ubicacion ?? 'N/A' }}</td>
                        <td>
                            <a href="{{ route('mantenimientos.edit', $mantenimiento->ID_Mantenimiento) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('mantenimientos.destroy', $mantenimiento->ID_Mantenimiento) }}" method="POST" style="display:inline">
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
