<?php

namespace App\Http\Controllers;

use App\Models\Pregunta;
use Illuminate\Http\Request;

class JuegoController extends Controller
{
    public function index()
    {
        return view('juego.index');
    }
    
    public function obtenerPreguntas(Request $request)
    {
        $request->validate([
            'cantidad' => 'required|integer|min:1|max:50',
            'categorias' => 'required|array',
            'categorias.*' => 'in:CRI,PE,CSIS,AMACSS,DAE'
        ]);

        $preguntas = Pregunta::whereHas('categoriasPivot', function($query) use ($request) {
                $query->whereIn('categoria', $request->categorias);
            })
            ->with('categoriasPivot')
            ->inRandomOrder()
            ->limit($request->cantidad)
            ->get(['id', 'pais', 'enunciado', 'respuesta']);

        return response()->json($preguntas);
    }

    // El resto del código se mantiene igual...
    public function verificarRespuesta(Request $request)
    {
        $request->validate([
            'pregunta_id' => 'required|exists:preguntas,id',
            'respuesta_usuario' => 'required|string',
            'intentos' => 'required|integer|min:1'
        ]);

        $pregunta = Pregunta::find($request->pregunta_id);
        
        $esCorrecta = strtolower(trim($pregunta->respuesta)) === strtolower(trim($request->respuesta_usuario));
        
        // Calcular puntuación basada en intentos
        $puntuacion = $this->calcularPuntuacion($esCorrecta, $request->intentos);

        return response()->json([
            'es_correcta' => $esCorrecta,
            'respuesta_correcta' => $pregunta->respuesta,
            'puntuacion_obtenida' => $puntuacion
        ]);
    }

    private function calcularPuntuacion($esCorrecta, $intentos)
    {
        if (!$esCorrecta) {
            return 0;
        }

        // Puntuación base: 100 puntos por respuesta correcta
        $puntuacionBase = 100;
        
        // Reducir puntos por cada intento adicional
        // Primer intento: 100 puntos, segundo: 50, tercero: 25, etc.
        $puntuacion = $puntuacionBase / pow(2, $intentos - 1);
        
        return (int) max($puntuacion, 10); // Mínimo 10 puntos
    }
}