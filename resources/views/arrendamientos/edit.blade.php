<!-- resources/views/arrendamientos/edit.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Editar Arrendamiento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Editar Arrendamiento</h1>

    <form action="{{ route('arrendamientos.update', $arrendamiento->ID_Arrendamiento) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="ID_Puesto" class="form-label">Puesto</label>
            <select id="ID_Puesto" name="ID_Puesto" class="form-select" required>
                @foreach ($puestos as $puesto)
                    <option value="{{ $puesto->ID_Puesto }}" {{ $puesto->ID_Puesto == $arrendamiento->ID_Puesto ? 'selected' : '' }}>
                        {{ $puesto->Ubicacion }}
                    </option>
                @endforeach
            </select>
            @error('ID_Puesto')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="ID_Comerciante" class="form-label">Comerciante</label>
            <select id="ID_Comerciante" name="ID_Comerciante" class="form-select" required>
                @foreach ($comerciantes as $comerciante)
                    <option value="{{ $comerciante->ID_Comerciante }}" {{ $comerciante->ID_Comerciante == $arrendamiento->ID_Comerciante ? 'selected' : '' }}>
                        {{ $comerciante->Nombre }}
                    </option>
                @endforeach
            </select>
            @error('ID_Comerciante')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Fecha_Inicio" class="form-label">Fecha de Inicio</label>
            <input type="date" id="Fecha_Inicio" name="Fecha_Inicio" class="form-control" value="{{ old('Fecha_Inicio', $arrendamiento->Fecha_Inicio) }}" required>
            @error('Fecha_Inicio')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Fecha_Fin" class="form-label">Fecha de Fin</label>
            <input type="date" id="Fecha_Fin" name="Fecha_Fin" class="form-control" value="{{ old('Fecha_Fin', $arrendamiento->Fecha_Fin) }}" required>
            @error('Fecha_Fin')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="Monto" class="form-label">Monto</label>
            <input type="number" id="Monto" name="Monto" class="form-control" step="0.01" value="{{ old('Monto', $arrendamiento->Monto) }}" required>
            @error('Monto')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Actualizar</button>
        <a href="{{ route('arrendamientos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
