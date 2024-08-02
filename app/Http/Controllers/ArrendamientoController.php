<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Arrendamiento;
use App\Models\Puesto;
use App\Models\Comerciante;

class ArrendamientoController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $arrendamientos = Arrendamiento::with(['puesto', 'comerciante'])->get();
        return view('arrendamientos.index', compact('arrendamientos'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        $puestos = Puesto::all();
        $comerciantes = Comerciante::all();
        return view('arrendamientos.create', compact('puestos', 'comerciantes'));
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'ID_Puesto' => 'required|exists:puestos,ID_Puesto',
            'ID_Comerciante' => 'required|exists:comerciantes,ID_Comerciante',
            'Fecha_Inicio' => 'required|date',
            'Fecha_Fin' => 'required|date|after_or_equal:Fecha_Inicio',
            'Monto' => 'required|numeric|min:0',
        ]);

        Arrendamiento::create($request->all());
        return redirect()->route('arrendamientos.index')->with('success', 'Arrendamiento creado exitosamente.');
    }

    // Display the specified resource
    public function show($id)
    {
        $arrendamiento = Arrendamiento::with(['puesto', 'comerciante'])->findOrFail($id);
        return view('arrendamientos.show', compact('arrendamiento'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $arrendamiento = Arrendamiento::findOrFail($id);
        $puestos = Puesto::all();
        $comerciantes = Comerciante::all();
        return view('arrendamientos.edit', compact('arrendamiento', 'puestos', 'comerciantes'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'ID_Puesto' => 'required|exists:puestos,ID_Puesto',
            'ID_Comerciante' => 'required|exists:comerciantes,ID_Comerciante',
            'Fecha_Inicio' => 'required|date',
            'Fecha_Fin' => 'required|date|after_or_equal:Fecha_Inicio',
            'Monto' => 'required|numeric|min:0',
        ]);

        $arrendamiento = Arrendamiento::findOrFail($id);
        $arrendamiento->update($request->all());
        return redirect()->route('arrendamientos.index')->with('success', 'Arrendamiento actualizado exitosamente.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $arrendamiento = Arrendamiento::findOrFail($id);
        $arrendamiento->delete();
        return redirect()->route('arrendamientos.index')->with('success', 'Arrendamiento eliminado exitosamente.');
    }
}
