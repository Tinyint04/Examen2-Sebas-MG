<?php

namespace App\Http\Controllers;

use App\Models\Atraccion;
use App\Models\Especie;
use Illuminate\Http\Request;

class AtraccionController extends Controller
{
    public function index()
    {
        $atracciones = Atraccion::with('especie')->get();
        return view('atracciones.index', compact('atracciones'));
    }

    public function create()
    {
        $especies = Especie::all();
        return view('atracciones.create', compact('especies'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|max:50',
            'descripcion' => 'required|max:50',
            'id_especie' => 'required|exists:especies,id',
        ]);

        Atraccion::create($request->all());

        return redirect()->route('atracciones.index')
            ->with('success', 'Atracción creada exitosamente.');
    }

    public function show(Atraccion $atraccion)
    {
        return view('atracciones.show', compact('atraccion'));
    }

    public function edit(Atraccion $atraccion)
    {
        $especies = Especie::all();
        return view('atracciones.edit', compact('atraccion', 'especies'));
    }

    public function update(Request $request, Atraccion $atraccion)
    {
        $request->validate([
            'titulo' => 'required|max:50',
            'descripcion' => 'required|max:50',
            'id_especie' => 'required|exists:especies,id',
        ]);

        $atraccion->update($request->all());

        return redirect()->route('atracciones.index')
            ->with('success', 'Atracción actualizada exitosamente');
    }

    public function destroy(Atraccion $atraccion)
    {
        $atraccion->delete();

        return redirect()->route('atracciones.index')
            ->with('success', 'Atracción eliminada exitosamente');
    }
}
