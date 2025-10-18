<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use App\Models\CategoriaPregunta;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    public function index()
    {
        $preguntas = Pregunta::with('categoriasPivot')->get();
        return view('preguntas.index', compact('preguntas'));
    }

    public function create()
    {
        return view('preguntas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'pais' => 'required|string|max:255',
            'enunciado' => 'required|string',
            'categorias' => 'required|array',
            'categorias.*' => 'in:CRI,PE,CSIS,AMACSS,DAE',
            'respuesta' => 'required|string|max:255',
        ]);

        $pregunta = Pregunta::create([
            'pais' => $request->pais,
            'enunciado' => $request->enunciado,
            'respuesta' => $request->respuesta,
        ]);

        // Asignar categorías directamente a la tabla pivot
        foreach ($request->categorias as $categoria) {
            CategoriaPregunta::create([
                'pregunta_id' => $pregunta->id,
                'categoria' => $categoria
            ]);
        }

        return redirect()->route('preguntas.index')
            ->with('success', 'Pregunta creada exitosamente.');
    }

    public function show(Pregunta $pregunta)
    {
        $pregunta->load('categoriasPivot');
        return view('preguntas.show', compact('pregunta'));
    }

    public function edit(Pregunta $pregunta)
    {
        $pregunta->load('categoriasPivot');
        return view('preguntas.edit', compact('pregunta'));
    }

    public function update(Request $request, Pregunta $pregunta)
    {
        $request->validate([
            'pais' => 'required|string|max:255',
            'enunciado' => 'required|string',
            'categorias' => 'required|array',
            'categorias.*' => 'in:CRI,PE,CSIS,AMACSS,DAE',
            'respuesta' => 'required|string|max:255',
        ]);

        $pregunta->update([
            'pais' => $request->pais,
            'enunciado' => $request->enunciado,
            'respuesta' => $request->respuesta,
        ]);

        // Sincronizar categorías
        CategoriaPregunta::where('pregunta_id', $pregunta->id)->delete(); // Eliminar categorías existentes
        foreach ($request->categorias as $categoria) {
            CategoriaPregunta::create([
                'pregunta_id' => $pregunta->id,
                'categoria' => $categoria
            ]);
        }

        return redirect()->route('preguntas.index')
            ->with('success', 'Pregunta actualizada exitosamente.');
    }

    public function destroy(Pregunta $pregunta)
    {
        CategoriaPregunta::where('pregunta_id', $pregunta->id)->delete(); // Eliminar categorías relacionadas
        $pregunta->delete();

        return redirect()->route('preguntas.index')
            ->with('success', 'Pregunta eliminada exitosamente.');
    }
}