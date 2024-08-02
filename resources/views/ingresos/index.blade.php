@extends('welcome')
@section('content')
    <!DOCTYPE html>
<html>
<head>
    <title>Ingresos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">Lista de Ingresos</h1>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif

            <a href="{{ route('ingresos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Ingreso</a>

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                <tr>
                    <th>Fecha</th>
                    <th>Descripción</th>
                    <th>Monto</th>
                    <th>Fuente</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($ingresos as $ingreso)
                    <tr>
                        <td>{{ $ingreso->Fecha }}</td>
                        <td>{{ $ingreso->Descripción }}</td>
                        <td>{{ $ingreso->Monto }}</td>
                        <td>{{ $ingreso->Fuente }}</td>
                        <td>
                            <a href="{{ route('ingresos.edit', $ingreso->ID_Ingreso) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('ingresos.destroy', $ingreso->ID_Ingreso) }}" method="POST" style="display:inline">
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
