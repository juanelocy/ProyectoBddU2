<?php

namespace App\Http\Controllers;

use App\Models\Mantenimiento;
use App\Models\Puesto;
use Illuminate\Http\Request;

class MantenimientoController extends Controller
{
    /**
     * Display a listing of the mantenimientos.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Cargar los mantenimientos junto con la relación de puestos
        $mantenimientos = Mantenimiento::with('puesto')->get();
        return view('mantenimientos.index', compact('mantenimientos'));
    }

    /**
     * Show the form for creating a new mantenimiento.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Obtener todos los puestos disponibles para el selector
        $puestos = Puesto::all();
        return view('mantenimientos.create', compact('puestos'));
    }

    /**
     * Store a newly created mantenimiento in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'Fecha' => 'required|date',
            'Descripción' => 'required|string',
            'Estado' => 'required|string|max:20',
            'ID_Puesto' => 'required|exists:puestos,ID_Puesto',
        ]);

        Mantenimiento::create($request->all());

        return redirect()->route('mantenimientos.index')
            ->with('success', 'Mantenimiento creado exitosamente.');
    }

    /**
     * Show the form for editing the specified mantenimiento.
     *
     * @param  \App\Models\Mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function edit(Mantenimiento $mantenimiento)
    {
        // Obtener todos los puestos disponibles para el selector
        $puestos = Puesto::all();

        // Asegúrate de que Fecha sea un objeto DateTime
        $mantenimiento->Fecha = \Carbon\Carbon::parse($mantenimiento->Fecha);

        return view('mantenimientos.edit', compact('mantenimiento', 'puestos'));
    }

    /**
     * Update the specified mantenimiento in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mantenimiento $mantenimiento)
    {
        $request->validate([
            'Fecha' => 'required|date',
            'Descripción' => 'required|string',
            'Estado' => 'required|string|max:20',
            'ID_Puesto' => 'required|exists:puestos,ID_Puesto',
        ]);

        $mantenimiento->update($request->all());

        return redirect()->route('mantenimientos.index')
            ->with('success', 'Mantenimiento actualizado exitosamente.');
    }

    /**
     * Remove the specified mantenimiento from storage.
     *
     * @param  \App\Models\Mantenimiento  $mantenimiento
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mantenimiento $mantenimiento)
    {
        $mantenimiento->delete();

        return redirect()->route('mantenimientos.index')
            ->with('success', 'Mantenimiento eliminado exitosamente.');
    }
}
