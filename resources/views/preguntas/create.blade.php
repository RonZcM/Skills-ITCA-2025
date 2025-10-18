@extends('layouts.app')

@section('title', 'Crear Pregunta')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold text-gray-800 mb-6">Crear Nueva Pregunta</h2>

    <form action="{{ route('preguntas.store') }}" method="POST">
        @csrf
        
        <div class="mb-4">
            <label for="pais" class="block text-gray-700 font-medium mb-2">País *</label>
            <input type="text" name="pais" id="pais" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   value="{{ old('pais') }}" required>
            @error('pais')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="categoria" class="block text-gray-700 font-medium mb-2">Categoría *</label>
            <select name="categoria" id="categoria" 
                    class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                <option value="">Selecciona una categoría</option>
                <option value="CRI" {{ old('categoria') == 'CRI' ? 'selected' : '' }}>CRI</option>
                <option value="PE" {{ old('categoria') == 'PE' ? 'selected' : '' }}>PE</option>
                <option value="CSIS" {{ old('categoria') == 'CSIS' ? 'selected' : '' }}>CSIS</option>
                <option value="AMACSS" {{ old('categoria') == 'AMACSS' ? 'selected' : '' }}>AMACSS</option>
                <option value="DAE" {{ old('categoria') == 'DAE' ? 'selected' : '' }}>DAE</option>
            </select>
            @error('categoria')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-4">
            <label for="enunciado" class="block text-gray-700 font-medium mb-2">Enunciado *</label>
            <textarea name="enunciado" id="enunciado" rows="4"
                      class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                      required>{{ old('enunciado') }}</textarea>
            @error('enunciado')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="mb-6">
            <label for="respuesta" class="block text-gray-700 font-medium mb-2">Respuesta Correcta *</label>
            <input type="text" name="respuesta" id="respuesta" 
                   class="w-full px-3 py-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500"
                   value="{{ old('respuesta') }}" required>
            @error('respuesta')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
        </div>

        <div class="flex justify-end space-x-4">
            <a href="{{ route('preguntas.index') }}" 
               class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded">
                Cancelar
            </a>
            <button type="submit" 
                    class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded">
                Crear Pregunta
            </button>
        </div>
    </form>
</div>
@endsection