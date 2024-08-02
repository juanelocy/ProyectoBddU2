@extends('welcome')

@section('content')
    <!-- resources/views/productos/index.blade.php -->
    <!DOCTYPE html>
    <html>
    <head>
        <title>Productos</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <h1 class="mb-4">Lista de Productos</h1>

                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        {{ $message }}
                    </div>
                @endif

                <a href="{{ route('productos.create') }}" class="btn btn-primary mb-3">Crear Nuevo Producto</a>

                <table class="table table-bordered table-striped">
                    <thead class="table-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Categoría</th>
                        <th>Precio</th>
                        <th>Stock</th>
                        <th>Fecha de Entrada</th>
                        <th>Fecha de Caducidad</th>
                        <th>Comerciante</th>
                        <th>Acciones</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach ($productos as $producto)
                        <tr>
                            <td>{{ $producto->Nombre }}</td>
                            <td>{{ $producto->Categoría }}</td>
                            <td>{{ $producto->Precio }}</td>
                            <td>{{ $producto->Stock }}</td>
                            <td>{{ $producto->Fecha_Entrada }}</td>
                            <td>{{ $producto->Fecha_Caducidad }}</td>
                            <td>{{ $producto->comerciante->Nombre }}</td>
                            <td>
                                <a href="{{ route('productos.edit', $producto->ID_Producto) }}" class="btn btn-warning btn-sm">Editar</a>
                                <form action="{{ route('productos.destroy', $producto->ID_Producto) }}" method="POST" style="display:inline">
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
