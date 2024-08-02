@extends('welcome')


@section('content')
    <!DOCTYPE html>
<html>
<head>
    <title>Pagos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">Lista de Pagos</h1>

            @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    {{ $message }}
                </div>
            @endif

            <a href="{{ route('pagos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Pago</a>

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                <tr>
                    <th>ID Arrendamiento</th>
                    <th>Fecha</th>
                    <th>Monto</th>
                    <th>Método de Pago</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($pagos as $pago)
                    <tr>
                        <td>{{ $pago->arrendamiento->ID_Arrendamiento ?? 'N/A' }}</td>
                        <td>{{ $pago->Fecha }}</td>
                        <td>{{ $pago->Monto }}</td>
                        <td>{{ $pago->Método_Pago }}</td>
                        <td>
                            <a href="{{ route('pagos.edit', $pago->ID_Pago) }}" class="btn btn-warning btn-sm">Editar</a>
                            <form action="{{ route('pagos.destroy', $pago->ID_Pago) }}" method="POST" style="display:inline">
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
