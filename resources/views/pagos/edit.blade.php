<!DOCTYPE html>
<html>
<head>
    <title>Editar Pago</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">Editar Pago</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pagos.update', $pago->ID_Pago) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="ID_Arrendamiento" class="form-label">Arrendamiento</label>
                    <select id="ID_Arrendamiento" name="ID_Arrendamiento" class="form-select" required>
                        <option value="" disabled>Seleccionar Arrendamiento</option>
                        @foreach($arrendamientos as $arrendamiento)
                            <option value="{{ $arrendamiento->ID_Arrendamiento }}" {{ $pago->ID_Arrendamiento == $arrendamiento->ID_Arrendamiento ? 'selected' : '' }}>
                                {{ $arrendamiento->ID_Arrendamiento }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label for="Fecha" class="form-label">Fecha</label>
                    <input type="date" id="Fecha" name="Fecha" class="form-control" value="{{ old('Fecha', $pago->Fecha ? $pago->Fecha->format('Y-m-d') : '') }}" required>
                </div>

                <div class="mb-3">
                    <label for="Monto" class="form-label">Monto</label>
                    <input type="number" id="Monto" name="Monto" class="form-control" step="0.01" value="{{ old('Monto', $pago->Monto) }}" required>
                </div>

                <div class="mb-3">
                    <label for="Método_Pago" class="form-label">Método de Pago</label>
                    <select id="Método_Pago" name="Método_Pago" class="form-select" required>
                        <option value="" disabled>Seleccionar Método de Pago</option>
                        <option value="Efectivo" {{ old('Método_Pago', $pago->Método_Pago) == 'Efectivo' ? 'selected' : '' }}>Efectivo</option>
                        <option value="Transferencia" {{ old('Método_Pago', $pago->Método_Pago) == 'Transferencia' ? 'selected' : '' }}>Transferencia</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
