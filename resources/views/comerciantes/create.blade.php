<!-- resources/views/comerciantes/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Crear Comerciante</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">Crear Nuevo Comerciante</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('comerciantes.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="Nombre" class="form-label">Nombre</label>
                    <input type="text" name="Nombre" class="form-control" id="Nombre" value="{{ old('Nombre') }}">
                </div>

                <div class="mb-3">
                    <label for="Datos_Contacto" class="form-label">Datos de Contacto</label>
                    <textarea name="Datos_Contacto" class="form-control" id="Datos_Contacto">{{ old('Datos_Contacto') }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="Tipo_Productos" class="form-label">Tipo de Productos</label>
                    <input type="text" name="Tipo_Productos" class="form-control" id="Tipo_Productos" value="{{ old('Tipo_Productos') }}">
                </div>

                <button type="submit" class="btn btn-primary">Guardar</button>
                <a href="{{ route('comerciantes.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
