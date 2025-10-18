<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use Illuminate\Http\Request;

class PreguntaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $preguntas = Pregunta::all();
        return view('preguntas.index', compact('preguntas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('preguntas.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'pais' => 'required|string|max:255',
            'enunciado' => 'required|string',
            'categoria' => 'required|in:CRI,PE,CSIS,AMACSS,DAE',
            'respuesta' => 'required|string|max:255',
        ]);

        Pregunta::create($request->all());

        return redirect()->route('preguntas.index')
            ->with('success', 'Pregunta creada exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Pregunta $pregunta)
    {
        return view('preguntas.show', compact('pregunta'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pregunta $pregunta)
    {
        return view('preguntas.edit', compact('pregunta'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pregunta $pregunta)
    {
        $request->validate([
            'pais' => 'required|string|max:255',
            'enunciado' => 'required|string',
            'categoria' => 'required|in:CRI,PE,CSIS,AMACSS,DAE',
            'respuesta' => 'required|string|max:255',
        ]);

        $pregunta->update($request->all());

        return redirect()->route('preguntas.index')
            ->with('success', 'Pregunta actualizada exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pregunta $pregunta)
    {
        $pregunta->delete();

        return redirect()->route('preguntas.index')
            ->with('success', 'Pregunta eliminada exitosamente.');
    }
}