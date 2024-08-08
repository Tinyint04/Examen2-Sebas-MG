<?php

namespace App\Http\Controllers;

use App\Models\Especie;
use Illuminate\Http\Request;

class EspecieController extends Controller
{
    public function index()
    {
        $especies = Especie::all();
        return view('especie.index', compact('especies'));
    }

    public function create()
    {
        return view('especies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'periodo' => 'required|max:50',
            'descripcion' => 'required|max:50',
        ]);

        Especie::create($request->all());

        return redirect()->route('especies.index')
            ->with('success', 'Especie creada exitosamente.');
    }

    public function show(Especie $especie)
    {
        return view('especies.show', compact('especie'));
    }

    public function edit(Especie $especie)
    {
        return view('especies.edit', compact('especie'));
    }

    public function update(Request $request, Especie $especie)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'periodo' => 'required|max:50',
            'descripcion' => 'required|max:50',
        ]);

        $especie->update($request->all());

        return redirect()->route('especies.index')
            ->with('success', 'Especie actualizada exitosamente');
    }

    public function destroy(Especie $especie)
    {
        $especie->delete();

        return redirect()->route('especies.index')
            ->with('success', 'Especie eliminada exitosamente');
    }
}
