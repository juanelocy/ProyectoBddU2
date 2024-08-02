<!DOCTYPE html>
<html>
<head>
    <title>Editar Mantenimiento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-5">
    <div class="row">
        <div class="col-md-8 offset-md-2">
            <h1 class="mb-4">Editar Mantenimiento</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('mantenimientos.update', $mantenimiento->ID_Mantenimiento) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label for="Fecha" class="form-label">Fecha</label>
                    <input type="date" id="Fecha" name="Fecha" class="form-control" value="{{ old('Fecha', $mantenimiento->Fecha->format('Y-m-d')) }}" required>
                </div>

                <div class="mb-3">
                    <label for="Descripción" class="form-label">Descripción</label>
                    <textarea id="Descripción" name="Descripción" class="form-control" rows="3" required>{{ old('Descripción', $mantenimiento->Descripción) }}</textarea>
                </div>

                <div class="mb-3">
                    <label for="Estado" class="form-label">Estado</label>
                    <select id="Estado" name="Estado" class="form-select" required>
                        <option value="" disabled>Seleccionar Estado</option>
                        <option value="Por Iniciar" {{ old('Estado', $mantenimiento->Estado) == 'Por Iniciar' ? 'selected' : '' }}>Por Iniciar</option>
                        <option value="En Proceso" {{ old('Estado', $mantenimiento->Estado) == 'En Proceso' ? 'selected' : '' }}>En Proceso</option>
                        <option value="Terminado" {{ old('Estado', $mantenimiento->Estado) == 'Terminado' ? 'selected' : '' }}>Terminado</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="ID_Puesto" class="form-label">Puesto</label>
                    <select id="ID_Puesto" name="ID_Puesto" class="form-select" required>
                        @foreach ($puestos as $puesto)
                            <option value="{{ $puesto->ID_Puesto }}" {{ old('ID_Puesto', $mantenimiento->ID_Puesto) == $puesto->ID_Puesto ? 'selected' : '' }}>
                                {{ $puesto->Ubicacion }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">Actualizar</button>
                <a href="{{ route('mantenimientos.index') }}" class="btn btn-secondary">Cancelar</a>
            </form>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
