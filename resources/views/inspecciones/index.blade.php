@extends('welcome')
@section('content')
    <!-- resources/views/inspecciones/index.blade.php -->
    <!DOCTYPE html>
    <html>
    <head>
        <title>Inspecciones</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
    <div class="container mt-5">
        <h1 class="mb-4">Lista de Inspecciones</h1>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                {{ $message }}
            </div>
        @endif

        <a href="{{ route('inspecciones.create') }}" class="btn btn-primary mb-3">Crear Nueva Inspección</a>

        <table class="table table-bordered table-striped">
            <thead class="table-dark">
            <tr>
                <th>Fecha</th>
                <th>Puesto</th>
                <th>Resultado</th>
                <th>Acciones</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($inspecciones as $inspeccion)
                <tr>
                    <td>{{ $inspeccion->Fecha}}</td>
                    <td>{{ $inspeccion->puesto->Ubicacion }}</td>
                    <td>{{ $inspeccion->Resultado }}</td>
                    {{--                <td>--}}
                    {{--                    <a href="{{ route('inspecciones.edit', $inspeccion->id) }}" class="btn btn-warning btn-sm">Editar</a>--}}
                    {{--                    <form action="{{ route('inspecciones.destroy', $inspeccion->id) }}" method="POST" style="display:inline">--}}
                    {{--                        @csrf--}}
                    {{--                        @method('DELETE')--}}
                    {{--                        <button type="submit" class="btn btn-danger btn-sm">Eliminar</button>--}}
                    {{--                    </form>--}}
                    {{--                </td>--}}
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    </body>
    </html>
@endsection
