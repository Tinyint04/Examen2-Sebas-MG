<?php

namespace App\Http\Controllers;

use App\Models\Comentario;
use App\Models\Atraccion;
use Illuminate\Http\Request;

class ComentarioController extends Controller
{
    public function index()
    {
        $comentarios = Comentario::with('atraccion')->get();
        return view('comentarios.index', compact('comentarios'));
    }

    public function create()
    {
        $atracciones = Atraccion::all();
        return view('comentarios.create', compact('atracciones'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_atraccion' => 'required|exists:atracciones,id',
            'nombre_usuario' => 'required|max:50',
            'calificacion' => 'required|integer|min:1|max:5',
            'detalles' => 'required|max:100',
        ]);

        Comentario::create($request->all());

        return redirect()->route('comentarios.index')
            ->with('success', 'Comentario creado exitosamente.');
    }

    public function show(Comentario $comentario)
    {
        return view('comentarios.show', compact('comentario'));
    }

    public function edit(Comentario $comentario)
    {
        $atracciones = Atraccion::all();
        return view('comentarios.edit', compact('comentario', 'atracciones'));
    }

    public function update(Request $request, Comentario $comentario)
    {
        $request->validate([
            'id_atraccion' => 'required|exists:atracciones,id',
            'nombre_usuario' => 'required|max:50',
            'calificacion' => 'required|integer|min:1|max:5',
            'detalles' => 'required|max:100',
        ]);

        $comentario->update($request->all());

        return redirect()->route('comentarios.index')
            ->with('success', 'Comentario actualizado exitosamente');
    }

    public function destroy(Comentario $comentario)
    {
        $comentario->delete();

        return redirect()->route('comentarios.index')
            ->with('success', 'Comentario eliminado exitosamente');
    }  
}
