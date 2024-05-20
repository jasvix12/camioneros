<?php

namespace App\Http\Controllers;

use App\Models\Camion;
use Illuminate\Http\Request;

class CamionController extends Controller
{
    public function index()
    {
        $camiones = Camion::all();
        return view('camiones.index', compact('camiones'));
    }

    public function create()
    {
        return view('camiones.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'potencia' => 'required|numeric',
            'matricula' => 'required|unique:camiones',
            'modelo' => 'required',
            'tipo' => 'required',
        ]);

        Camion::create($request->all());
        return redirect()->route('camiones.index')->with('success', 'Camion creado exitosamente.');
    }

    public function show(Camion $camion)
    {
        return view('camiones.show', compact('camion'));
    }

    public function edit(Camion $camion)
    {
        return view('camiones.edit', compact('camion'));
    }

    public function update(Request $request, Camion $camion)
    {
        $request->validate([
            'potencia' => 'required|numeric',
            'matricula' => 'required|unique:camiones,matricula,' . $camion->id,
            'modelo' => 'required',
            'tipo' => 'required',
        ]);

        $camion->update($request->all());
        return redirect()->route('camiones.index')->with('success', 'Camion actualizado exitosamente.');
    }

    public function destroy(Camion $camion)
    {
        $camion->delete();
        return redirect()->route('camiones.index')->with('success', 'Camion eliminado exitosamente.');
    }
}
