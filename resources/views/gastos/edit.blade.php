<!-- resources/views/gastos/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Editar Gasto</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">Editar Gasto</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('gastos.update', $gasto->ID_Gasto) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="Fecha" class="form-label">Fecha</label>
                    <input type="date" id="Fecha" name="Fecha" class="form-control" value="{{ old('Fecha', $gasto->Fecha) }}" required>
                </div>

                <div class="mb-3">
                    <label for="Descripción" class="form-label">Descripción</label>
                    <textarea id="Descripción" name="Descripción" class="form-control" rows="3" required>{{ old('Descripción', $gasto->Descripción) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="Monto" class="form-label">Monto</label>
                    <input type="number" id="Monto" name="Monto" class="form-control" step="0.01" value="{{ old('Monto', $gasto->Monto) }}" required>
                </div>

                <div class="mb-3">
                    <label for="Tipo" class="form-label">Tipo</label>
                    <select id="Tipo" name="Tipo" class="form-select" required>
                        <option value="Gasto Fijo" {{ old('Tipo', $gasto->Tipo) == 'Gasto Fijo' ? 'selected' : '' }}>Gasto Fijo</option>
                        <option value="Gasto Variable" {{ old('Tipo', $gasto->Tipo) == 'Gasto Variable' ? 'selected' : '' }}>Gasto Variable</option>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('gastos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
