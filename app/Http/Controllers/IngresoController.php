<?php

namespace App\Http\Controllers;

use App\Models\Ingreso;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IngresoController extends Controller
{
    public function index()
    {
        $ingresos = Ingreso::all();
        return view('ingresos.index', compact('ingresos'));
    }

    public function create()
    {
        return view('ingresos.create');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'Fecha' => 'required|date',
            'Descripción' => 'required|string',
            'Monto' => 'required|numeric',
            'Fuente' => 'required|string',
        ]);

        Ingreso::create($validatedData);

        return redirect()->route('ingresos.index')->with('success', 'Ingreso creado exitosamente.');
    }

    public function edit(Ingreso $ingreso)
    {
        return view('ingresos.edit', compact('ingreso'));
    }

    public function update(Request $request, Ingreso $ingreso)
    {
        $validatedData = $request->validate([
            'Fecha' => 'required|date',
            'Descripción' => 'required|string',
            'Monto' => 'required|numeric',
            'Fuente' => 'required|string',
        ]);

        $ingreso->update($validatedData);

        return redirect()->route('ingresos.index')->with('success', 'Ingreso actualizado exitosamente.');
    }

    public function destroy(Ingreso $ingreso)
    {
        $ingreso->delete();
        return redirect()->route('ingresos.index')->with('success', 'Ingreso eliminado exitosamente.');
    }
}
