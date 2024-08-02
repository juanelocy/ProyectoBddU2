@extends('welcome')


@section('content')
    <!DOCTYPE html>
    <html>
    <head>
        <title>Comerciantes</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-4">Lista de Comerciantes</h1>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif

                <a href="{{ route('comerciantes.create') }}" class="btn btn-primary mb-3">Crear Nuevo Comerciante</a>

                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Datos de Contacto</th>
                        <th>Tipo de Productos</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($comerciantes as $comerciante)
                        <tr>
                            <td>{{ $comerciante->Nombre }}</td>
                            <td>{{ $comerciante->Datos_Contacto }}</td>
                            <td>{{ $comerciante->Tipo_Productos }}</td>
                            <td>
                                <a href="{{ route('comerciantes.edit', $comerciante->ID_Comerciante) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('comerciantes.destroy', $comerciante->ID_Comerciante) }}" method="POST" style="display:inline">
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
