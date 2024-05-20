<?php

namespace App\Http\Controllers;

use App\Models\Camionero;
use Illuminate\Http\Request;

class CamioneroController extends Controller
{
   
    public function index()
    {
        $camioneros = Camionero::all();
        return view('camioneros.index', compact('camioneros'));
    }

    public function create()
    {
        return view('camioneros.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required',
            'poblacion' => 'required',
            'dni' => 'required|unique:camioneros',
            'tfno' => 'required',
            'direccion' => 'required',
            'salario' => 'required|numeric',
        ]);

        Camionero::create($request->all());
        return redirect()->route('camioneros.index')->with('success', 'Camionero creado exitosamente.');
    }
    
    public function show(Camionero $camionero)
    {
        return view('camioneros.show', compact('camionero'));
    }

    public function edit(string $id)
    {
        return view('camioneros.edit', compact('camionero')); 
    }

    public function update(Request $request, Camionero $camionero)
    {
        $request->validate([
            'nombre' => 'required',
            'poblacion' => 'required',
            'dni' => 'required|unique:camioneros,dni,' . $camionero->id,
            'tfno' => 'required',
            'direccion' => 'required',
            'salario' => 'required|numeric',
        ]);

        $camionero->update($request->all());
        return redirect()->route('camioneros.index')->with('success', 'Camionero actualizado exitosamente.');
    }

    public function destroy(Camionero $camionero)
    {
        $camionero->delete();
        return redirect()->route('camioneros.index')->with('success', 'Camionero eliminado exitosamente.');
    }
}
