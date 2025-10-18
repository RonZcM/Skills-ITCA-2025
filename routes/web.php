<?php

use App\Http\Controllers\PreguntaController;
use App\Http\Controllers\JuegoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

// Rutas para el CRUD de preguntas
Route::resource('preguntas', PreguntaController::class);

// Rutas para el juego
Route::get('/juego', [JuegoController::class, 'index'])->name('juego.index');
Route::post('/juego/obtener-preguntas', [JuegoController::class, 'obtenerPreguntas'])->name('juego.obtener-preguntas');
Route::post('/juego/verificar-respuesta', [JuegoController::class, 'verificarRespuesta'])->name('juego.verificar-respuesta');