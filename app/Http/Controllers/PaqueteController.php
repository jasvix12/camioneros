<?php

namespace App\Http\Controllers;

use App\Models\Paquete;
use Illuminate\Http\Request;

class PaqueteController extends Controller
{
    public function index()
    {
        $paquetes = Paquete::all();
        return view('paquetes.index', compact('paquetes'));
    }

    public function create()
    {
        return view('paquetes.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'codigo' => 'required|unique:paquetes',
            'descripcion' => 'required',
            'destinatario' => 'required',
            'direccion' => 'required',
            'camionero_id' => 'required|exists:camioneros,id',
        ]);

        Paquete::create($request->all());
        return redirect()->route('paquetes.index')->with('success', 'Paquete creado exitosamente.');
    }

    public function show(Paquete $paquete)
    {
        return view('paquetes.show', compact('paquete'));
    }

    public function edit(Paquete $paquete)
    {
        return view('paquetes.edit', compact('paquete'));
    }

    public function update(Request $request, Paquete $paquete)
    {
        $request->validate([
            'codigo' => 'required|unique:paquetes,codigo,' . $paquete->id,
            'descripcion' => 'required',
            'destinatario' => 'required',
            'direccion' => 'required',
            'camionero_id' => 'required|exists:camioneros,id',
        ]);

        $paquete->update($request->all());
        return redirect()->route('paquetes.index')->with('success', 'Paquete actualizado exitosamente.');
    }

    public function destroy(Paquete $paquete)
    {
        $paquete->delete();
        return redirect()->route('paquetes.index')->with('success', 'Paquete eliminado exitosamente.');
    }
}
