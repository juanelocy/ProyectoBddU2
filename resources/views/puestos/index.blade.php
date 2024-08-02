@extends('welcome')
@section('content')
    <!-- resources/views/puestos/index.blade.php -->
    <!DOCTYPE html>
    <html>
    <head>
        <title>Puestos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-4">Lista de Puestos</h1>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif

                <a href="{{ route('puestos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Puesto</a>

                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                    <tr>
                        <th>Ubicación</th>
                        <th>Estado</th>
                        <th>Precio de Alquiler</th>
                        <th>Concesionario</th>
                        <th>Contacto</th>
                        <th>Productos</th>
                        <th>Fecha Ingreso</th>
                        <th>Fecha Salida</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($puestos as $puesto)
                        <tr>
                            <td>{{ $puesto->Ubicacion }}</td>
                            <td>{{ $puesto->Estado }}</td>
                            <td>{{ $puesto->Precio_Alquiler }}</td>
                            <td>{{ $puesto->Concesionario }}</td>
                            <td>{{ $puesto->Contacto }}</td>
                            <td>{{ $puesto->Productos }}</td>
                            <td>{{ $puesto->Fecha_Ingreso }}</td>
                            <td>{{ $puesto->Fecha_Salida }}</td>
                            <td>
                                <a href="{{ route('puestos.edit', $puesto->ID_Puesto) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('puestos.destroy', $puesto->ID_Puesto) }}" method="POST" style="display:inline">
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
