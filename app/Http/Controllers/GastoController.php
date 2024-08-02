<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gastos = Gasto::all();
        return view('gastos.index', compact('gastos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gastos.create');
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
            'Descripción' => 'required|string',
            'Monto' => 'required|numeric',
            'Tipo' => 'required|string|max:50',
        ]);

        Gasto::create($request->all());

        return redirect()->route('gastos.index')
            ->with('success', 'Gasto creado con éxito.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function show(Gasto $gasto)
    {
        return view('gastos.show', compact('gasto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function edit(Gasto $gasto)
    {
        return view('gastos.edit', compact('gasto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Gasto $gasto)
    {
        $request->validate([
            'Fecha' => 'required|date',
            'Descripción' => 'required|string',
            'Monto' => 'required|numeric',
            'Tipo' => 'required|string|max:50',
        ]);

        $gasto->update($request->all());

        return redirect()->route('gastos.index')
            ->with('success', 'Gasto actualizado con éxito.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Gasto  $gasto
     * @return \Illuminate\Http\Response
     */
    public function destroy(Gasto $gasto)
    {
        $gasto->delete();

        return redirect()->route('gastos.index')
            ->with('success', 'Gasto eliminado con éxito.');
    }
}
