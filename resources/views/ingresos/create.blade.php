<!DOCTYPE html>
<html>
<head>
    <title>Crear Ingreso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">Crear Nuevo Ingreso</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('ingresos.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="Fecha" class="form-label">Fecha</label>
                    <input type="date" id="Fecha" name="Fecha" class="form-control" value="{{ old('Fecha') }}" required>
                </div>

                <div class="mb-3">
                    <label for="Descripción" class="form-label">Descripción</label>
                    <input type="text" id="Descripción" name="Descripción" class="form-control" value="{{ old('Descripción') }}" required>
                </div>

                <div class="mb-3">
                    <label for="Monto" class="form-label">Monto</label>
                    <input type="number" id="Monto" name="Monto" class="form-control" step="0.01" value="{{ old('Monto') }}" required>
                </div>

                <div class="mb-3">
                    <label for="Fuente" class="form-label">Fuente</label>
                    <input type="text" id="Fuente" name="Fuente" class="form-control" value="{{ old('Fuente') }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Crear</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
