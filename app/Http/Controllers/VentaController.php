<?php

namespace App\Http\Controllers;

use App\Models\Venta;
use App\Models\Producto;
use App\Models\Comerciante;
use Illuminate\Http\Request;

class VentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ventas = Venta::with(['producto', 'comerciante'])->get();
        return view('ventas.index', compact('ventas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productos = Producto::all();
        $comerciantes = Comerciante::all();
        return view('ventas.create', compact('productos', 'comerciantes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Fecha' => 'required|date',
            'ID_Producto' => 'required|exists:productos,ID_Producto',
            'Cantidad' => 'required|integer|min:1',
            'Monto_Total' => 'required|numeric|min:0',
            'ID_Comerciante' => 'required|exists:comerciantes,ID_Comerciante',
        ]);

        Venta::create($request->all());

        return redirect()->route('ventas.index')->with('success', 'Venta creada exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function edit(Venta $venta)
    {
        $productos = Producto::all();
        $comerciantes = Comerciante::all();

        $venta->Fecha  = \Carbon\Carbon::parse($venta->Fecha);

        return view('ventas.edit', compact('venta', 'productos', 'comerciantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Venta $venta)
    {
        $request->validate([
            'Fecha' => 'required|date',
            'ID_Producto' => 'required|exists:productos,ID_Producto',
            'Cantidad' => 'required|integer|min:1',
            'Monto_Total' => 'required|numeric|min:0',
            'ID_Comerciante' => 'required|exists:comerciantes,ID_Comerciante',
        ]);

        $venta->update($request->all());

        return redirect()->route('ventas.index')->with('success', 'Venta actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Venta  $venta
     * @return \Illuminate\Http\Response
     */
    public function destroy(Venta $venta)
    {
        $venta->delete();
        return redirect()->route('ventas.index')->with('success', 'Venta eliminada exitosamente.');
    }
}
