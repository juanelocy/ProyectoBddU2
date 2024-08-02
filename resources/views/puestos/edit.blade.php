<!-- resources/views/puestos/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Editar Puesto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h1 class="mb-4">Editar Puesto</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('puestos.update', $puesto->ID_Puesto) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="Ubicacion" class="form-label">Ubicación</label>
                    <input type="text" name="Ubicacion" class="form-control" value="{{ $puesto->Ubicacion }}" required>
                </div>

                <div class="mb-3">
                    <label for="Estado" class="form-label">Estado</label>
                    <input type="text" name="Estado" class="form-control" value="{{ $puesto->Estado }}" required>
                </div>

                <div class="mb-3">
                    <label for="Precio_Alquiler" class="form-label">Precio de Alquiler</label>
                    <input type="text" name="Precio_Alquiler" class="form-control" value="{{ $puesto->Precio_Alquiler }}" required>
                </div>

                <div class="mb-3">
                    <label for="Concesionario" class="form-label">Concesionario</label>
                    <input type="text" name="Concesionario" class="form-control" value="{{ $puesto->Concesionario }}" required>
                </div>

                <div class="mb-3">
                    <label for="Contacto" class="form-label">Contacto</label>
                    <input type="text" name="Contacto" class="form-control" value="{{ $puesto->Contacto }}" required>
                </div>

                <div class="mb-3">
                    <label for="Productos" class="form-label">Productos</label>
                    <input type="text" name="Productos" class="form-control" value="{{ $puesto->Productos }}" required>
                </div>

                <div class="mb-3">
                    <label for="Fecha_Ingreso" class="form-label">Fecha de Ingreso</label>
                    <input type="date" name="Fecha_Ingreso" class="form-control" value="{{ $puesto->Fecha_Ingreso }}">
                </div>

                <div class="mb-3">
                    <label for="Fecha_Salida" class="form-label">Fecha de Salida</label>
                    <input type="date" name="Fecha_Salida" class="form-control" value="{{ $puesto->Fecha_Salida }}">
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('puestos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
