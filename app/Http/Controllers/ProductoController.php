<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Comerciante;
use Illuminate\Http\Request;

class ProductoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productos = Producto::with('comerciante')->get();
        return view('productos.index', compact('productos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $comerciantes = Comerciante::all();
        return view('productos.create', compact('comerciantes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string|max:100',
            'Categoría' => 'required|string|max:50',
            'Precio' => 'required|numeric',
            'Stock' => 'required|integer',
            'Fecha_Entrada' => 'required|date',
            'Fecha_Caducidad' => 'required|date',
            'ID_Comerciante' => 'required|exists:comerciantes,ID_Comerciante',
        ]);

        Producto::create($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function show(Producto $producto)
    {
        return view('productos.show', compact('producto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function edit(Producto $producto)
    {
        $comerciantes = Comerciante::all();
        return view('productos.edit', compact('producto', 'comerciantes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Producto $producto)
    {
        $request->validate([
            'Nombre' => 'required|string|max:100',
            'Categoría' => 'required|string|max:50',
            'Precio' => 'required|numeric',
            'Stock' => 'required|integer',
            'Fecha_Entrada' => 'required|date',
            'Fecha_Caducidad' => 'required|date',
            'ID_Comerciante' => 'required|exists:comerciantes,ID_Comerciante',
        ]);

        $producto->update($request->all());

        return redirect()->route('productos.index')->with('success', 'Producto actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\Producto $producto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Producto $producto)
    {
        $producto->delete();

        return redirect()->route('productos.index')->with('success', 'Producto eliminado con éxito.');
    }
}
