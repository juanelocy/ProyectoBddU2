<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use App\Models\Arrendamiento;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PagoController extends Controller
{
    public function index()
    {
        $pagos = Pago::with('arrendamiento')->get();
        return view('pagos.index', compact('pagos'));
    }

    public function create()
    {
        $arrendamientos = Arrendamiento::all();
        return view('pagos.create', compact('arrendamientos'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'ID_Arrendamiento' => 'required|exists:arrendamientos,ID_Arrendamiento',
            'Fecha'            => 'required|date',
            'Monto'            => 'required|numeric',
            'Método_Pago'      => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()->route('pagos.create')
                ->withErrors($validator)
                ->withInput();
        }

        Pago::create($request->all());

        return redirect()->route('pagos.index')
            ->with('success', 'Pago creado exitosamente.');
    }

    public function edit($id)
    {
        $pago = Pago::findOrFail($id);
        $arrendamientos = Arrendamiento::all();

        $pago->Fecha  = \Carbon\Carbon::parse($pago->Fecha);
        return view('pagos.edit', compact('pago', 'arrendamientos'));
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'ID_Arrendamiento' => 'required|exists:arrendamientos,ID_Arrendamiento',
            'Fecha'            => 'required|date',
            'Monto'            => 'required|numeric',
            'Método_Pago'      => 'required|string|max:50',
        ]);

        if ($validator->fails()) {
            return redirect()->route('pagos.edit', $id)
                ->withErrors($validator)
                ->withInput();
        }

        $pago = Pago::findOrFail($id);
        $pago->update($request->all());

        return redirect()->route('pagos.index')
            ->with('success', 'Pago actualizado exitosamente.');
    }

    public function destroy($id)
    {
        $pago = Pago::findOrFail($id);
        $pago->delete();

        return redirect()->route('pagos.index')
            ->with('success', 'Pago eliminado exitosamente.');
    }
}
