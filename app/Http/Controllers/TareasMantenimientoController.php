<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Mantenimiento;
use App\Models\TareasMantenimiento;

class TareasMantenimientoController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $tareas = TareasMantenimiento::with('mantenimiento')->get();
        return view('tareas.index', compact('tareas'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        $mantenimientos = Mantenimiento::all();
        return view('tareas.create', compact('mantenimientos'));
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'ID_Mantenimiento' => 'required|exists:mantenimientos,ID_Mantenimiento',
            'descripcion' => 'required|string|max:255',
            'fecha_programada' => 'required|date',
            'fecha_realizada' => 'nullable|date',
        ]);

        TareasMantenimiento::create($request->all());
        return redirect()->route('tareas_mantenimientos.index')->with('success', 'Tarea de mantenimiento creada exitosamente.');
    }

    // Display the specified resource
    public function show($id)
    {
        $tarea = TareasMantenimiento::with('mantenimiento')->findOrFail($id);
        return view('tareas.show', compact('tarea'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $tarea = TareasMantenimiento::findOrFail($id);
        $mantenimientos = Mantenimiento::all();
        return view('tareas.edit', compact('tarea', 'mantenimientos'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'ID_Mantenimiento' => 'required|exists:mantenimientos,ID_Mantenimiento',
            'descripcion' => 'required|string|max:255',
            'fecha_programada' => 'required|date',
            'fecha_realizada' => 'nullable|date',
        ]);

        $tarea = TareasMantenimiento::findOrFail($id);
        $tarea->update($request->all());
        return redirect()->route('tareas_mantenimientos.index')->with('success', 'Tarea de mantenimiento actualizada exitosamente.');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $tarea = TareasMantenimiento::findOrFail($id);
        $tarea->delete();
        return redirect()->route('tareas_mantenimientos.index')->with('success', 'Tarea de mantenimiento eliminada exitosamente.');
    }
}
