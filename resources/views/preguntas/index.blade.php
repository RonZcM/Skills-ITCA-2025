@extends('layouts.app')

@section('title', 'Lista de Preguntas')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold text-gray-800">Lista de Preguntas</h2>
        <a href="{{ route('preguntas.create') }}" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
            Crear Nueva Pregunta
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white">
            <thead>
                <tr class="bg-gray-200 text-gray-600 uppercase text-sm leading-normal">
                    <th class="py-3 px-6 text-left">País</th>
                    <th class="py-3 px-6 text-left">Categorías</th>
                    <th class="py-3 px-6 text-left">Enunciado</th>
                    <th class="py-3 px-6 text-left">Respuesta</th>
                    <th class="py-3 px-6 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody class="text-gray-600 text-sm font-light">
                @foreach($preguntas as $pregunta)
                <tr class="border-b border-gray-200 hover:bg-gray-100">
                    <td class="py-3 px-6 text-left whitespace-nowrap">
                        <span class="font-medium">{{ $pregunta->pais }}</span>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="flex flex-wrap gap-1">
                            @foreach($pregunta->categoriasPivot as $categoria)
                            <span class="bg-blue-100 text-blue-800 py-1 px-2 rounded-full text-xs">
                                {{ $categoria->categoria }}
                            </span>
                            @endforeach
                        </div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <div class="truncate max-w-xs">{{ $pregunta->enunciado }}</div>
                    </td>
                    <td class="py-3 px-6 text-left">
                        <span class="font-medium">{{ $pregunta->respuesta }}</span>
                    </td>
                    <td class="py-3 px-6 text-center">
                        <div class="flex item-center justify-center space-x-2">
                            <a href="{{ route('preguntas.edit', $pregunta->id) }}" 
                               class="bg-yellow-500 hover:bg-yellow-600 text-white px-3 py-1 rounded text-xs">
                                Editar
                            </a>
                            <form action="{{ route('preguntas.destroy', $pregunta->id) }}" method="POST" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" 
                                        class="bg-red-500 hover:bg-red-600 text-white px-3 py-1 rounded text-xs"
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
</div>
@endsection