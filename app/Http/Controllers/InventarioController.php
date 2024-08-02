<?php

namespace App\Http\Controllers;

use App\Models\Inventario;
use App\Models\Producto;
use Illuminate\Http\Request;

class InventarioController extends Controller
{
    /**
     * Display a listing of the inventarios.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inventarios = Inventario::with('producto')->get();
        return view('inventarios.index', compact('inventarios'));
    }

    /**
     * Show the form for creating a new inventario.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::all();
        return view('inventarios.create', compact('productos'));
    }

    /**
     * Store a newly created inventario in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ID_Producto' => 'required|exists:productos,ID_Producto',
            'Cantidad' => 'required|integer',
            'Fecha_Registro' => 'required|date',
        ]);

        Inventario::create($request->all());

        return redirect()->route('inventarios.index')
            ->with('success', 'Inventario creado exitosamente.');
    }

    /**
     * Show the form for editing the specified inventario.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function edit(Inventario $inventario)
    {
        $productos = Producto::all();

        // Asegúrate de que Fecha_Registro sea un objeto DateTime
        $inventario->Fecha_Registro = \Carbon\Carbon::parse($inventario->Fecha_Registro);

        return view('inventarios.edit', compact('inventario', 'productos'));
    }

    /**
     * Update the specified inventario in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Inventario $inventario)
    {
        $request->validate([
            'ID_Producto' => 'required|exists:productos,ID_Producto',
            'Cantidad' => 'required|integer',
            'Fecha_Registro' => 'required|date',
        ]);

        $inventario->update($request->all());

        return redirect()->route('inventarios.index')
            ->with('success', 'Inventario actualizado exitosamente.');
    }

    /**
     * Remove the specified inventario from storage.
     *
     * @param  \App\Models\Inventario  $inventario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Inventario $inventario)
    {
        $inventario->delete();

        return redirect()->route('inventarios.index')
            ->with('success', 'Inventario eliminado exitosamente.');
    }
}
