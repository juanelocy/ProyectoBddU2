<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tarea de Mantenimiento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Crear Tarea de Mantenimiento</h1>

    <form action="{{ route('tareas_mantenimientos.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="ID_Mantenimiento" class="form-label">Mantenimiento</label>
            <select id="ID_Mantenimiento" name="ID_Mantenimiento" class="form-select" required>
                <option value="" disabled selected>Seleccione un mantenimiento</option>
                @foreach($mantenimientos as $mantenimiento)
                    <option value="{{ $mantenimiento->ID_Mantenimiento }}">{{ $mantenimiento->ID_Mantenimiento }}</option>
                @endforeach
            </select>
            @error('ID_Mantenimiento')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripción</label>
            <textarea id="descripcion" name="descripcion" class="form-control" rows="3" required>{{ old('descripcion') }}</textarea>
            @error('descripcion')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="fecha_programada" class="form-label">Fecha Programada</label>
            <input type="date" id="fecha_programada" name="fecha_programada" class="form-control" value="{{ old('fecha_programada') }}" required>
            @error('fecha_programada')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="fecha_realizada" class="form-label">Fecha Realizada</label>
            <input type="date" id="fecha_realizada" name="fecha_realizada" class="form-control" value="{{ old('fecha_realizada') }}">
            @error('fecha_realizada')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Guardar Tarea</button>
        <a href="{{ route('tareas_mantenimientos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
