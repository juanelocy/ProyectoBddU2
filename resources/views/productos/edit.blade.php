<!-- resources/views/productos/edit.blade.php -->

<!DOCTYPE html>
<html>
<head>
    <title>Editar Producto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">Editar Producto</h1>

            <!-- Mostrar mensajes de error -->
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <!-- Formulario para editar el producto -->
            <form action="{{ route('productos.update', $producto->ID_Producto) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="Nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="Nombre" name="Nombre" value="{{ old('Nombre', $producto->Nombre) }}" required>
                </div>

                <div class="mb-3">
                    <label for="Categoría" class="form-label">Categoría</label>
                    <input type="text" class="form-control" id="Categoría" name="Categoría" value="{{ old('Categoría', $producto->Categoría) }}" required>
                </div>

                <div class="mb-3">
                    <label for="Precio" class="form-label">Precio</label>
                    <input type="number" class="form-control" id="Precio" name="Precio" step="0.01" value="{{ old('Precio', $producto->Precio) }}" required>
                </div>

                <div class="mb-3">
                    <label for="Stock" class="form-label">Stock</label>
                    <input type="number" class="form-control" id="Stock" name="Stock" value="{{ old('Stock', $producto->Stock) }}" required>
                </div>

                <div class="mb-3">
                    <label for="Fecha_Entrada" class="form-label">Fecha de Entrada</label>
                    <input type="date" class="form-control" id="Fecha_Entrada" name="Fecha_Entrada" value="{{ old('Fecha_Entrada', $producto->Fecha_Entrada) }}" required>
                </div>

                <div class="mb-3">
                    <label for="Fecha_Caducidad" class="form-label">Fecha de Caducidad</label>
                    <input type="date" class="form-control" id="Fecha_Caducidad" name="Fecha_Caducidad" value="{{ old('Fecha_Caducidad', $producto->Fecha_Caducidad) }}" required>
                </div>

                <div class="mb-3">
                    <label for="ID_Comerciante" class="form-label">Comerciante</label>
                    <select class="form-select" id="ID_Comerciante" name="ID_Comerciante" required>
                        @foreach ($comerciantes as $comerciante)
                            <option value="{{ $comerciante->ID_Comerciante }}" {{ $comerciante->ID_Comerciante == $producto->ID_Comerciante ? 'selected' : '' }}>
                                {{ $comerciante->Nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
