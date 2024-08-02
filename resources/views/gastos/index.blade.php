@extends('welcome')


@section('content')
    <!-- resources/views/gastos/index.blade.php -->
    <!DOCTYPE html>
    <html>
    <head>
        <title>Gastos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-4">Lista de Gastos</h1>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif

                <a href="{{ route('gastos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Gasto</a>

                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                    <tr>
                        <th>Fecha</th>
                        <th>Descripción</th>
                        <th>Monto</th>
                        <th>Tipo</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($gastos as $gasto)
                        <tr>
                            <td>{{ $gasto->Fecha }}</td>
                            <td>{{ $gasto->Descripción }}</td>
                            <td>{{ $gasto->Monto }}</td>
                            <td>{{ $gasto->Tipo }}</td>
                            <td>
                                <a href="{{ route('gastos.edit', $gasto->ID_Gasto) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('gastos.destroy', $gasto->ID_Gasto) }}" method="POST" style="display:inline">
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
