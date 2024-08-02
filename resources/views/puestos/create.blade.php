<!-- resources/views/puestos/create.blade.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Crear Nuevo Puesto</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Crear Nuevo Puesto</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>¡Ups!</strong> Hay algunos problemas con tu entrada.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('puestos.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="Ubicacion">Ubicación:</label>
            <input type="text" name="Ubicacion" class="form-control" placeholder="Ubicación" value="{{ old('Ubicacion') }}">
        </div>

        <div class="form-group">
            <label for="Estado">Estado:</label>
            <input type="text" name="Estado" class="form-control" placeholder="Estado" value="{{ old('Estado') }}">
        </div>

        <div class="form-group">
            <label for="Precio_Alquiler">Precio de Alquiler:</label>
            <input type="number" name="Precio_Alquiler" class="form-control" placeholder="Precio de Alquiler" value="{{ old('Precio_Alquiler') }}" step="0.01">
        </div>

        <div class="form-group">
            <label for="Concesionario">Concesionario:</label>
            <input type="text" name="Concesionario" class="form-control" placeholder="Concesionario" value="{{ old('Concesionario') }}">
        </div>

        <div class="form-group">
            <label for="Contacto">Contacto:</label>
            <input type="text" name="Contacto" class="form-control" placeholder="Contacto" value="{{ old('Contacto') }}">
        </div>

        <div class="form-group">
            <label for="Productos">Productos:</label>
            <input type="text" name="Productos" class="form-control" placeholder="Productos" value="{{ old('Productos') }}">
        </div>

        <div class="form-group">
            <label for="Fecha_Ingreso">Fecha de Ingreso:</label>
            <input type="date" name="Fecha_Ingreso" class="form-control" value="{{ old('Fecha_Ingreso') }}">
        </div>

        <div class="form-group">
            <label for="Fecha_Salida">Fecha de Salida:</label>
            <input type="date" name="Fecha_Salida" class="form-control" value="{{ old('Fecha_Salida') }}">
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
        <a class="btn btn-secondary" href="{{ route('puestos.index') }}">Cancelar</a>
    </form>
</div>
</body>
</html>
