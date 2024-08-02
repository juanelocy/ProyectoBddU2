@extends('welcome')

@section('content')
    <!DOCTYPE html>
<html>
<head>
    <title>Ventas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">Lista de Ventas</h1>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif

            <a href="{{ route('ventas.create') }}" class="btn btn-primary mb-3">Crear Nueva Venta</a>

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                <tr>
                    <th>Fecha</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Monto Total</th>
                    <th>Comerciante</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($ventas as $venta)
                    <tr>
                        <td>{{ $venta->Fecha }}</td>
                        <td>{{ $venta->producto->Nombre }}</td>
                        <td>{{ $venta->Cantidad }}</td>
                        <td>${{ number_format($venta->Monto_Total, 2) }}</td>
                        <td>{{ $venta->comerciante->Nombre }}</td>
                        <td>
                            <a href="{{ route('ventas.edit', $venta->ID_Venta) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('ventas.destroy', $venta->ID_Venta) }}" method="POST" style="display:inline">
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
