@extends('layouts.app')

@section('title', 'Lista de Preguntas')

@section('content')
<div class="bg-[#0B1E28] border border-[#00C8FF] rounded-lg shadow-lg p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-[#FFD33D]">Lista de Preguntas</h2>
        <a href="{{ route('preguntas.create') }}" class="bg-[#FFF04B] hover:bg-[#FFD33D] text-[#0B1E28] px-4 py-2 rounded font-medium transition-colors shadow-md">
            Crear Nueva Pregunta
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-[#07212C] rounded-lg overflow-hidden">
            <thead>
                <tr class="bg-[#0B1E28] text-[#A8C3C7] uppercase text-sm leading-normal border-b border-[#00C8FF]">
                    <th class="py-3 px-6 text-left font-semibold">País</th>
                    <th class="py-3 px-6 text-left font-semibold">Categorías</th>
                    <th class="py-3 px-6 text-left font-semibold">Enunciado</th>
                    <th class="py-3 px-6 text-left font-semibold">Respuesta</th>
                    <th class="py-3 px-6 text-center font-semibold">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-[#A8C3C7] text-sm font-light">
                @foreach($preguntas as $pregunta)
                <tr class="border-b border-[#00C8FF] hover:bg-[#0B1E28] transition-colors">
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <span class="font-medium text-[#FFD33D]">{{ $pregunta->pais }}</span>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="flex flex-wrap gap-1">
                            @foreach($pregunta->categoriasPivot as $categoria)
                            <span class="bg-[#00C8FF] text-[#0B1E28] py-1 px-2 rounded-full text-xs font-medium">
                                {{ $categoria->categoria }}
                            </span>
                            @endforeach
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="truncate max-w-xs">{{ $pregunta->enunciado }}</div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <span class="font-medium text-[#4CAF50]">{{ $pregunta->respuesta }}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex item-center justify-center space-x-2">
                            <a href="{{ route('preguntas.edit', $pregunta->id) }}" 
                               class="bg-[#00C8FF] hover:bg-[#0B1E28] text-[#0B1E28] hover:text-[#00C8FF] border border-[#00C8FF] px-3 py-1 rounded text-xs font-medium transition-colors">
                                Editar
                            </a>
                            <form action="{{ route('preguntas.destroy', $pregunta->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-[#FF4040] hover:bg-[#0B1E28] text-white hover:text-[#FF4040] border border-[#FF4040] px-3 py-1 rounded text-xs font-medium transition-colors"
                                        onclick="return confirm('¿Estás seguro de eliminar esta pregunta?')">
                                    Eliminar
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    @if($preguntas->isEmpty())
    <div class="text-center py-8">
        <p class="text-[#A8C3C7] text-lg">No hay preguntas registradas.</p>
        <a href="{{ route('preguntas.create') }}" class="inline-block mt-4 bg-[#FFF04B] hover:bg-[#FFD33D] text-[#0B1E28] px-4 py-2 rounded font-medium transition-colors">
            Crear Primera Pregunta
        </a>
    </div>
    @endif
</div>
@endsection