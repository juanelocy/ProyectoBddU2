<!DOCTYPE html>
<html>
<head>
    <title>Editar Inventario</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">Editar Inventario</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('inventarios.update', $inventario->ID_Inventario) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="ID_Producto" class="form-label">Producto</label>
                    <select id="ID_Producto" name="ID_Producto" class="form-select">
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->ID_Producto }}" {{ $producto->ID_Producto == $inventario->ID_Producto ? 'selected' : '' }}>
                                {{ $producto->Nombre }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="Cantidad" class="form-label">Cantidad</label>
                    <input type="number" id="Cantidad" name="Cantidad" class="form-control" value="{{ old('Cantidad', $inventario->Cantidad) }}" required>
                </div>

                <div class="mb-3">
                    <label for="Fecha_Registro" class="form-label">Fecha de Registro</label>
                    <input type="date" id="Fecha_Registro" name="Fecha_Registro" class="form-control" value="{{ old('Fecha_Registro', $inventario->Fecha_Registro) }}" required>
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('inventarios.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
