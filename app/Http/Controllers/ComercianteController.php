<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comerciante;

class ComercianteController extends Controller
{
    // Mostrar la lista de comerciantes
    public function index()
    {
        $comerciantes = Comerciante::all();
        return view('comerciantes.index', compact('comerciantes'));
    }

    // Mostrar el formulario para crear un nuevo comerciante
    public function create()
    {
        return view('comerciantes.create');
    }

    // Guardar un nuevo comerciante en la base de datos
    public function store(Request $request)
    {
        $request->validate([
            'Nombre' => 'required|string|max:100',
            'Datos_Contacto' => 'required|string',
            'Tipo_Productos' => 'required|string|max:100',
        ]);

        Comerciante::create($request->all());

        return redirect()->route('comerciantes.index')->with('success', 'Comerciante creado con éxito.');
    }

    // Mostrar el formulario para editar un comerciante existente
    public function edit(Comerciante $comerciante)
    {
        return view('comerciantes.edit', compact('comerciante'));
    }

    // Actualizar un comerciante existente en la base de datos
    public function update(Request $request, Comerciante $comerciante)
    {
        $request->validate([
            'Nombre' => 'required|string|max:100',
            'Datos_Contacto' => 'required|string',
            'Tipo_Productos' => 'required|string|max:100',
        ]);

        $comerciante->update($request->all());

        return redirect()->route('comerciantes.index')->with('success', 'Comerciante actualizado con éxito.');
    }

    // Eliminar un comerciante de la base de datos
    public function destroy(Comerciante $comerciante)
    {
        $comerciante->delete();
        return redirect()->route('comerciantes.index')->with('success', 'Comerciante eliminado con éxito.');
    }
}
