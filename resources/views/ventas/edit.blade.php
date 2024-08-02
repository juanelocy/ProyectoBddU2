<!DOCTYPE html>
<html>
<head>
    <title>Editar Venta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">Editar Venta</h1>

            <form action="{{ route('ventas.update', $venta->ID_Venta) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="Fecha" class="form-label">Fecha</label>
                    <input type="date" id="Fecha" name="Fecha" class="form-control" value="{{ old('Fecha', $venta->Fecha->format('Y-m-d')) }}" required>
                    @error('Fecha')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="ID_Producto" class="form-label">Producto</label>
                    <select id="ID_Producto" name="ID_Producto" class="form-select" required>
                        <option value="" disabled>Seleccione un producto</option>
                        @foreach ($productos as $producto)
                            <option value="{{ $producto->ID_Producto }}" {{ old('ID_Producto', $venta->ID_Producto) == $producto->ID_Producto ? 'selected' : '' }}>
                                {{ $producto->Nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('ID_Producto')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="Cantidad" class="form-label">Cantidad</label>
                    <input type="number" id="Cantidad" name="Cantidad" class="form-control" value="{{ old('Cantidad', $venta->Cantidad) }}" min="1" required>
                    @error('Cantidad')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="Monto_Total" class="form-label">Monto Total</label>
                    <input type="number" id="Monto_Total" name="Monto_Total" class="form-control" value="{{ old('Monto_Total', $venta->Monto_Total) }}" step="0.01" required>
                    @error('Monto_Total')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="ID_Comerciante" class="form-label">Comerciante</label>
                    <select id="ID_Comerciante" name="ID_Comerciante" class="form-select" required>
                        <option value="" disabled>Seleccione un comerciante</option>
                        @foreach ($comerciantes as $comerciante)
                            <option value="{{ $comerciante->ID_Comerciante }}" {{ old('ID_Comerciante', $venta->ID_Comerciante) == $comerciante->ID_Comerciante ? 'selected' : '' }}>
                                {{ $comerciante->Nombre }}
                            </option>
                        @endforeach
                    </select>
                    @error('ID_Comerciante')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary">Actualizar Venta</button>
                <a href="{{ route('ventas.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
