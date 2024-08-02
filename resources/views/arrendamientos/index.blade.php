@extends('welcome')

@section('content')
    <!DOCTYPE html>
    <html>
    <head>
        <title>Arrendamientos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-4">Lista de Arrendamientos</h1>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif

                <a href="{{ route('arrendamientos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Arrendamiento</a>

                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                    <tr>
                        <th>Puesto</th>
                        <th>Comerciante</th>
                        <th>Fecha de Inicio</th>
                        <th>Fecha de Fin</th>
                        <th>Monto</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($arrendamientos as $arrendamiento)
                        <tr>
                            <td>{{ $arrendamiento->puesto->Ubicacion }}</td>
                            <td>{{ $arrendamiento->comerciante->Nombre }}</td>
                            <td>{{ $arrendamiento->Fecha_Inicio }}</td>
                            <td>{{ $arrendamiento->Fecha_Fin }}</td>
                            <td>{{ $arrendamiento->Monto }}</td>
                            <td>
                                <a href="{{ route('arrendamientos.edit', $arrendamiento->ID_Arrendamiento) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('arrendamientos.destroy', $arrendamiento->ID_Arrendamiento) }}" method="POST" style="display:inline">
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
