<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Create rout for PuestoController using resource method
Route::resource('puestos', \App\Http\Controllers\PuestoController::class);
Route::resource('comerciantes', \App\Http\Controllers\ComercianteController::class);
Route::resource('arrendamientos', \App\Http\Controllers\ArrendamientoController::class);
Route::resource('productos', \App\Http\Controllers\ProductoController::class);
Route::resource('inventarios', \App\Http\Controllers\InventarioController::class);
Route::resource('ventas', \App\Http\Controllers\VentaController::class);
Route::resource('pagos', \App\Http\Controllers\PagoController::class);
Route::resource('ingresos', \App\Http\Controllers\IngresoController::class);
Route::resource('gastos', \App\Http\Controllers\GastoController::class);
Route::resource('mantenimientos', \App\Http\Controllers\MantenimientoController::class);
Route::resource('inspecciones', \App\Http\Controllers\InspeccionController::class)->parameters([
    'inspeccione' => 'inspeccione'
]);
Route::resource('tareas_mantenimientos', \App\Http\Controllers\TareasMantenimientoController::class);
