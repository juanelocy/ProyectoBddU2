<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Arial', sans-serif;
            color: #333;
        }
        #sidebar {
            height: 100vh;
            position: fixed;
            top: 0;
            left: 0;
            width: 250px;
            background-color: #343a40;
            color: #fff;
            z-index: 100;
            padding-top: 20px;
        }
        #sidebar a {
            color: #fff;
        }
        #sidebar a:hover {
            background-color: #495057;
            text-decoration: none;
        }
        #sidebar .nav-link.active {
            background-color: #007bff;
            color: #fff;
        }
        #main-content {
            margin-left: 250px;
            padding: 20px;
        }
        .nav-item h5 {
            color: #007bff;
            border-bottom: 1px solid #007bff;
            padding-bottom: 10px;
        }
        .container {
            max-width: 1000px;
        }
    </style>
</head>
<body>
<div id="sidebar">
    <div class="position-sticky">
        <ul class="nav flex-column">
            <li class="nav-item">
                <h5 class="nav-link">Gestión de Espacios y Puestos de Venta</h5>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('puestos.index') }}">
                    <i class="fas fa-store"></i> Ingreso de Puestos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('comerciantes.index') }}">
                    <i class="fas fa-user-tie"></i> Ingreso de Comerciantes
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('arrendamientos.index') }}">
                    <i class="fas fa-handshake"></i> Ingreso de Arrendamiento
                </a>
            </li>
            <li class="nav-item">
                <h5 class="nav-link">Inventario y Gestión de Productos</h5>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('productos.index') }}">
                    <i class="fas fa-box"></i> Ingreso de Productos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('inventarios.index') }}">
                    <i class="fas fa-archive"></i> Ingreso de Inventario
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ventas.index') }}">
                    <i class="fas fa-shopping-cart"></i> Ventas
                </a>
            </li>
            <li class="nav-item">
                <h5 class="nav-link">Transacciones y Finanzas</h5>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('pagos.index') }}">
                    <i class="fas fa-credit-card"></i> Pagos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('gastos.index') }}">
                    <i class="fas fa-money-bill-wave"></i> Gastos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('ingresos.index') }}">
                    <i class="fas fa-wallet"></i> Ingresos
                </a>
            </li>
            <li class="nav-item">
                <h5 class="nav-link">Mantenimiento</h5>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('mantenimientos.index') }}">
                    <i class="fas fa-tools"></i> Mantenimientos
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('tareas_mantenimientos.index') }}">
                    <i class="fas fa-tasks"></i> Tareas de Mantenimiento
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('inspecciones.index') }}">
                    <i class="fas fa-search"></i> Inspecciones
                </a>
            </li>
        </ul>
    </div>
</div>

<div id="main-content">
    @yield('content')
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
