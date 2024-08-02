<?php

namespace App\Http\Controllers;

use App\Models\Puesto;
use Illuminate\Http\Request;

class PuestoController extends Controller
{
    public function index()
    {
        $puestos = Puesto::all();
        return view('puestos.index', compact('puestos'));
    }

    public function create()
    {
        return view('puestos.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'Ubicacion' => 'required|string|max:100',
            'Estado' => 'required|string|max:20',
            'Precio_Alquiler' => 'required|numeric',
            'Concesionario' => 'required|string|max:100',
            'Contacto' => 'required|string|max:100',
            'Productos' => 'required|string|max:255',
            'Fecha_Ingreso' => 'nullable|date',
            'Fecha_Salida' => 'nullable|date',
        ]);

        Puesto::create($request->all());

        return redirect()->route('puestos.index')
            ->with('success', 'Puesto creado exitosamente.');
    }

    public function show(Puesto $puesto)
    {
        return view('puestos.show', compact('puesto'));
    }

    public function edit(Puesto $puesto)
    {
        return view('puestos.edit', compact('puesto'));
    }

    public function update(Request $request, Puesto $puesto)
    {
        $request->validate([
            'Ubicacion' => 'required|string|max:100',
            'Estado' => 'required|string|max:20',
            'Precio_Alquiler' => 'required|numeric',
            'Concesionario' => 'required|string|max:100',
            'Contacto' => 'required|string|max:100',
            'Productos' => 'required|string|max:255',
            'Fecha_Ingreso' => 'nullable|date',
            'Fecha_Salida' => 'nullable|date',
        ]);

        $puesto->update($request->all());

        return redirect()->route('puestos.index')
            ->with('success', 'Puesto actualizado exitosamente.');
    }

    public function destroy(Puesto $puesto)
    {
        $puesto->delete();

        return redirect()->route('puestos.index')
            ->with('success', 'Puesto eliminado exitosamente.');
    }
}
