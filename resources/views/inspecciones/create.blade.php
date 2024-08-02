<!-- resources/views/inspecciones/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Crear Inspección</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">Crear Nueva Inspección</h1>

            <form action="{{ route('inspecciones.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label for="Fecha" class="form-label">Fecha</label>
                    <input type="date" id="Fecha" name="Fecha" class="form-control" value="{{ old('Fecha') }}" required>
                    @error('Fecha')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="ID_Puesto" class="form-label">Puesto</label>
                    <select id="ID_Puesto" name="ID_Puesto" class="form-select" required>
                        <option value="" disabled selected>Seleccione un puesto</option>
                        @foreach ($puestos as $puesto)
                            <option value="{{ $puesto->ID_Puesto }}" {{ old('ID_Puesto') == $puesto->ID_Puesto ? 'selected' : '' }}>
                                {{ $puesto->Ubicacion }}
                            </option>
                        @endforeach
                    </select>
                    @error('ID_Puesto')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label for="Resultado" class="form-label">Resultado</label>
                    <select id="Resultado" name="Resultado" class="form-select" required>
                        <option value="" disabled selected>Seleccione un resultado</option>
                        <option value="Aprobada" {{ old('Resultado') == 'Aprobada' ? 'selected' : '' }}>Aprobada</option>
                        <option value="Desaprobada" {{ old('Resultado') == 'Desaprobada' ? 'selected' : '' }}>Desaprobada</option>
                    </select>
                    @error('Resultado')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Crear Inspección</button>
                    <a href="{{ route('inspecciones.index') }}" class="btn btn-secondary">Cancelar</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
