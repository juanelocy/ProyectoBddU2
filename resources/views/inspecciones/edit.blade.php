<!-- resources/views/inspecciones/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Editar Inspección</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Editar Inspección</h1>

    <form action="{{ route('inspecciones.update', $inspeccion->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="Fecha" class="form-label">Fecha</label>
            <input type="date" id="Fecha" name="Fecha" class="form-control" value="{{ old('Fecha', $inspeccion->Fecha->format('Y-m-d')) }}" required>
        </div>

        <div class="mb-3">
            <label for="ID_Puesto" class="form-label">Puesto</label>
            <select id="ID_Puesto" name="ID_Puesto" class="form-select" required>
                @foreach($puestos as $puesto)
                    <option value="{{ $puesto->ID_Puesto }}" {{ $puesto->ID_Puesto == old('ID_Puesto', $inspeccion->ID_Puesto) ? 'selected' : '' }}>
                        {{ $puesto->Ubicacion }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="Resultado" class="form-label">Resultado</label>
            <select id="Resultado" name="Resultado" class="form-select" required>
                <option value="aprobada" {{ old('Resultado', $inspeccion->Resultado) == 'aprobada' ? 'selected' : '' }}>Aprobada</option>
                <option value="desaprobada" {{ old('Resultado', $inspeccion->Resultado) == 'desaprobada' ? 'selected' : '' }}>Desaprobada</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Actualizar Inspección</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
