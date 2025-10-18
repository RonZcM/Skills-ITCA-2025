@extends('layouts.app')

@section('title', 'Jugar Quiz')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 max-w-4xl mx-auto">
    <h2 class="text-3xl font-bold text-center text-gray-800 mb-8">Quiz Game</h2>

    <!-- Configuración del juego -->
    <div id="configuracion-juego">
        <form id="form-configuracion" class="space-y-6">
            @csrf
            
            <div>
                <label for="cantidad_preguntas" class="block text-gray-700 font-medium mb-2">
                    Cantidad de Preguntas *
                </label>
                <select name="cantidad_preguntas" id="cantidad_preguntas" 
                        class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                    <option value="">Selecciona cantidad</option>
                    <option value="5">5 preguntas</option>
                    <option value="10">10 preguntas</option>
                    <option value="15">15 preguntas</option>
                    <option value="20">20 preguntas</option>
                </select>
            </div>

            <div>
                <label class="block text-gray-700 font-medium mb-2">Categorías *</label>
                <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                    @foreach(['CRI', 'PE', 'CSIS', 'AMACSS', 'DAE'] as $categoria)
                    <label class="flex items-center p-2 border border-gray-300 rounded hover:bg-gray-50">
                        <input type="checkbox" name="categorias[]" value="{{ $categoria }}" 
                               class="rounded border-gray-300 text-blue-600 focus:ring-blue-500">
                        <span class="ml-2 text-gray-700">{{ $categoria }}</span>
                    </label>
                    @endforeach
                </div>
            </div>

            <div class="text-center">
                <button type="submit" 
                        class="bg-green-500 hover:bg-green-600 text-white px-8 py-3 rounded-lg text-lg font-medium">
                    Comenzar Juego
                </button>
            </div>
        </form>
    </div>

    <!-- Juego activo -->
    <div id="juego-activo" class="hidden">
        <div class="flex justify-between items-center mb-6">
            <div id="contador-preguntas" class="text-lg font-semibold text-gray-700">
                Pregunta <span id="pregunta-actual">1</span> de <span id="total-preguntas">0</span>
            </div>
            <div id="puntuacion-actual" class="text-lg font-semibold text-green-600">
                Puntuación: <span id="puntos">0</span>
            </div>
        </div>

        <div id="pregunta-container" class="bg-blue-50 border border-blue-200 rounded-lg p-6 mb-6">
            <div class="flex justify-between items-start mb-4">
                <span id="categoria-pregunta" class="bg-blue-500 text-white px-3 py-1 rounded-full text-sm"></span>
                <span id="pais-pregunta" class="bg-gray-500 text-white px-3 py-1 rounded-full text-sm"></span>
            </div>
            <h3 id="enunciado-pregunta" class="text-xl font-semibold text-gray-800 mb-4"></h3>
            
            <div class="space-y-3">
                <input type="text" id="respuesta-input" 
                       placeholder="Escribe tu respuesta..." 
                       class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                
                <div class="flex justify-between items-center">
                    <span id="intentos-info" class="text-sm text-gray-500">Intentos: <span id="intentos">0</span></span>
                    <button id="siguiente-pregunta" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg hidden">
                        Siguiente Pregunta
                    </button>
                    <button id="enviar-respuesta" class="bg-green-500 hover:bg-green-600 text-white px-6 py-2 rounded-lg">
                        Enviar Respuesta
                    </button>
                </div>
            </div>
        </div>

        <div id="resultado-container" class="hidden"></div>

        <div id="resumen-juego" class="hidden text-center">
            <h3 class="text-2xl font-bold text-gray-800 mb-4">¡Juego Terminado!</h3>
            <p class="text-xl mb-4">Puntuación final: <span id="puntuacion-final" class="font-bold text-green-600">0</span> puntos</p>
            <button id="jugar-nuevamente" class="bg-blue-500 hover:bg-blue-600 text-white px-6 py-2 rounded-lg">
                Jugar Nuevamente
            </button>
        </div>
    </div>
</div>

<script>
let preguntas = [];
let preguntaActual = 0;
let puntuacionTotal = 0;
let intentosActual = 0;
let juegoEnCurso = false;

document.getElementById('form-configuracion').addEventListener('submit', async function(e) {
    e.preventDefault();
    
    const cantidad = document.getElementById('cantidad_preguntas').value;
    const categorias = Array.from(document.querySelectorAll('input[name="categorias[]"]:checked'))
                           .map(checkbox => checkbox.value);
    
    if (categorias.length === 0) {
        alert('Selecciona al menos una categoría');
        return;
    }

    await iniciarJuego(cantidad, categorias);
});

async function iniciarJuego(cantidad, categorias) {
    try {
        const response = await fetch('/juego/obtener-preguntas', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                cantidad: cantidad,
                categorias: categorias
            })
        });

        const data = await response.json();

        if (data.length === 0) {
            alert('No hay preguntas disponibles para las categorías seleccionadas.');
            return;
        }

        preguntas = data;
        preguntaActual = 0;
        puntuacionTotal = 0;
        juegoEnCurso = true;

        // Mostrar juego y ocultar configuración
        document.getElementById('configuracion-juego').classList.add('hidden');
        document.getElementById('juego-activo').classList.remove('hidden');

        mostrarPreguntaActual();
        
    } catch (error) {
        console.error('Error:', error);
        alert('Error al cargar las preguntas.');
    }
}

function mostrarPreguntaActual() {
    if (preguntaActual >= preguntas.length) {
        terminarJuego();
        return;
    }

    const pregunta = preguntas[preguntaActual];
    intentosActual = 0;

    document.getElementById('pregunta-actual').textContent = preguntaActual + 1;
    document.getElementById('total-preguntas').textContent = preguntas.length;
    document.getElementById('puntos').textContent = puntuacionTotal;
    document.getElementById('categoria-pregunta').textContent = pregunta.categoria;
    document.getElementById('pais-pregunta').textContent = pregunta.pais;
    document.getElementById('enunciado-pregunta').textContent = pregunta.enunciado;
    document.getElementById('respuesta-input').value = '';
    document.getElementById('intentos').textContent = intentosActual;
    
    document.getElementById('siguiente-pregunta').classList.add('hidden');
    document.getElementById('enviar-respuesta').classList.remove('hidden');
    document.getElementById('resultado-container').classList.add('hidden');
    
    document.getElementById('respuesta-input').focus();
}

document.getElementById('enviar-respuesta').addEventListener('click', verificarRespuesta);
document.getElementById('respuesta-input').addEventListener('keypress', function(e) {
    if (e.key === 'Enter') {
        verificarRespuesta();
    }
});

async function verificarRespuesta() {
    const respuestaInput = document.getElementById('respuesta-input');
    const respuestaUsuario = respuestaInput.value.trim();

    if (!respuestaUsuario) {
        alert('Por favor, escribe una respuesta.');
        return;
    }

    intentosActual++;

    try {
        const response = await fetch('/juego/verificar-respuesta', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                pregunta_id: preguntas[preguntaActual].id,
                respuesta_usuario: respuestaUsuario,
                intentos: intentosActual
            })
        });

        const resultado = await response.json();
        mostrarResultado(resultado);

    } catch (error) {
        console.error('Error:', error);
        alert('Error al verificar la respuesta.');
    }
}

function mostrarResultado(resultado) {
    const resultadoContainer = document.getElementById('resultado-container');
    
    if (resultado.es_correcta) {
        puntuacionTotal += resultado.puntuacion_obtenida;
        resultadoContainer.innerHTML = `
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">
                <p class="font-bold">¡Correcto! +${resultado.puntuacion_obtenida} puntos</p>
                <p>Puntuación actual: ${puntuacionTotal} puntos</p>
            </div>
        `;
    } else {
        resultadoContainer.innerHTML = `
            <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
                <p class="font-bold">Incorrecto</p>
                <p>La respuesta correcta era: <strong>${resultado.respuesta_correcta}</strong></p>
                <p class="text-sm">Intentos usados: ${intentosActual}</p>
            </div>
        `;
    }

    resultadoContainer.classList.remove('hidden');
    document.getElementById('enviar-respuesta').classList.add('hidden');
    document.getElementById('siguiente-pregunta').classList.remove('hidden');
    document.getElementById('puntos').textContent = puntuacionTotal;
    document.getElementById('intentos').textContent = intentosActual;
}

document.getElementById('siguiente-pregunta').addEventListener('click', function() {
    preguntaActual++;
    mostrarPreguntaActual();
});

function terminarJuego() {
    juegoEnCurso = false;
    document.getElementById('pregunta-container').classList.add('hidden');
    document.getElementById('resultado-container').classList.add('hidden');
    document.getElementById('resumen-juego').classList.remove('hidden');
    document.getElementById('puntuacion-final').textContent = puntuacionTotal;
}

document.getElementById('jugar-nuevamente').addEventListener('click', function() {
    document.getElementById('resumen-juego').classList.add('hidden');
    document.getElementById('configuracion-juego').classList.remove('hidden');
    document.getElementById('juego-activo').classList.add('hidden');
});
</script>
@endsection