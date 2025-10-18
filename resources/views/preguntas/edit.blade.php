@extends('layouts.app')

@section('title', 'Editar Pregunta')

@section('content')
<div class="bg-[#0B1E28] border border-[#00C8FF] rounded-lg shadow-lg p-6 max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold text-[#FFD33D] mb-6">Editar Pregunta</h2>

    <form action="{{ route('preguntas.update', $pregunta->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-4">
            <label for="pais" class="block text-[#A8C3C7] font-medium mb-2">País *</label>
            <input type="text" name="pais" id="pais" 
                   class="w-full px-3 py-2 bg-[#07212C] border border-[#00C8FF] rounded-md text-[#A8C3C7] focus:outline-none focus:ring-2 focus:ring-[#FFD33D] placeholder-[#A8C3C7]"
                   value="{{ old('pais', $pregunta->pais) }}" required>
            @error('pais')
                <p class="text-[#FF4040] text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-[#A8C3C7] font-medium mb-2">Categorías *</label>
            <div class="grid grid-cols-2 md:grid-cols-3 gap-2">
                @foreach(['CRI', 'PE', 'CSIS', 'AMACSS', 'DAE'] as $categoria)
                <label class="flex items-center p-2 bg-[#07212C] border border-[#00C8FF] rounded hover:bg-[#0B1E28] transition-colors">
                    <input type="checkbox" name="categorias[]" value="{{ $categoria }}" 
                           class="rounded border-[#00C8FF] text-[#FFD33D] focus:ring-[#FFD33D]"
                           {{ in_array($categoria, old('categorias', $pregunta->categoriasPivot->pluck('categoria')->toArray())) ? 'checked' : '' }}>
                    <span class="ml-2 text-[#A8C3C7]">{{ $categoria }}</span>
                </label>
                @endforeach
            </div>
            @error('categorias')
                <p class="text-[#FF4040] text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="enunciado" class="block text-[#A8C3C7] font-medium mb-2">Enunciado *</label>
            <textarea name="enunciado" id="enunciado" rows="4"
                      class="w-full px-3 py-2 bg-[#07212C] border border-[#00C8FF] rounded-md text-[#A8C3C7] focus:outline-none focus:ring-2 focus:ring-[#FFD33D] placeholder-[#A8C3C7]"
                      required>{{ old('enunciado', $pregunta->enunciado) }}</textarea>
            @error('enunciado')
                <p class="text-[#FF4040] text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="respuesta" class="block text-[#A8C3C7] font-medium mb-2">Respuesta Correcta *</label>
            <input type="text" name="respuesta" id="respuesta" 
                   class="w-full px-3 py-2 bg-[#07212C] border border-[#00C8FF] rounded-md text-[#A8C3C7] focus:outline-none focus:ring-2 focus:ring-[#FFD33D] placeholder-[#A8C3C7]"
                   value="{{ old('respuesta', $pregunta->respuesta) }}" required>
            @error('respuesta')
                <p class="text-[#FF4040] text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('preguntas.index') }}" 
               class="bg-[#07212C] hover:bg-[#0B1E28] text-[#A8C3C7] hover:text-[#FFD33D] border border-[#00C8FF] px-4 py-2 rounded transition-colors font-medium">
                Cancelar
            </a>
            <button type="submit" 
                    class="bg-[#FFF04B] hover:bg-[#FFD33D] text-[#0B1E28] px-4 py-2 rounded font-medium transition-colors shadow-md">
                Actualizar Pregunta
            </button>
        </div>
    </form>
</div>
@endsection