<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Especie;
use Illuminate\Http\Request;

class EspecieController extends Controller
{
    public function index()
    {
        $especies = Especie::all();
        return response()->json($especies);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'periodo' => 'required|max:50',
            'descripcion' => 'required|max:50',
        ]);

        $especie = Especie::create($request->all());
        return response()->json($especie, 201);
    }

    public function show(Especie $especie)
    {
        return response()->json($especie);
    }

    public function update(Request $request, Especie $especie)
    {
        $request->validate([
            'nombre' => 'required|max:50',
            'periodo' => 'required|max:50',
            'descripcion' => 'required|max:50',
        ]);

        $especie->update($request->all());
        return response()->json($especie);
    }

    public function destroy(Especie $especie)
    {
        $especie->delete();
        return response()->json(null, 204);
    }

    public function atracciones(Especie $especie)
    {
        $atracciones = $especie->atracciones;
        return response()->json($atracciones);
    }
}
