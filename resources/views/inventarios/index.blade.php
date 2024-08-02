@extends('welcome')

@section('content')
    <!DOCTYPE html>
<html>
<head>
    <title>Inventarios</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">Lista de Inventarios</h1>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif

            <a href="{{ route('inventarios.create') }}" class="btn btn-primary mb-3">Crear Nuevo Inventario</a>

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                <tr>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Fecha de Registro</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($inventarios as $inventario)
                    <tr>
                        <td>{{ $inventario->producto->Nombre }}</td>
                        <td>{{ $inventario->Cantidad }}</td>
                        <td>{{ $inventario->Fecha_Registro }}</td>
                        <td>
                            <a href="{{ route('inventarios.edit', $inventario->ID_Inventario) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('inventarios.destroy', $inventario->ID_Inventario) }}" method="POST" style="display:inline">
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
