<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Inspeccion;
use App\Models\Puesto;

class InspeccionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $inspecciones = Inspeccion::with('puesto')->get();
        return view('inspecciones.index', compact('inspecciones'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $puestos = Puesto::all();
        return view('inspecciones.create', compact('puestos'));
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
            'ID_Puesto' => 'required|exists:puestos,ID_Puesto',
            'Fecha' => 'required|date',
            'Resultado' => 'required|in:Aprobada,Desaprobada',
        ]);

        Inspeccion::create($request->all());

        return redirect()->route('inspecciones.index')
            ->with('success', 'Inspección creada exitosamente.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $inspeccion = Inspeccion::findOrFail($id);
        $puestos = Puesto::all();
        return view('inspecciones.edit', compact('inspeccion', 'puestos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ID_Puesto' => 'required|exists:puestos,ID_Puesto',
            'Fecha' => 'required|date',
            'Resultado' => 'required|in:Aprobada,Desaprobada',
        ]);

        $inspeccion = Inspeccion::findOrFail($id);
        $inspeccion->update($request->all());

        return redirect()->route('inspecciones.index')
            ->with('success', 'Inspección actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $inspeccion = Inspeccion::findOrFail($id);
        $inspeccion->delete();

        return redirect()->route('inspecciones.index')
            ->with('success', 'Inspección eliminada exitosamente.');
    }
}
