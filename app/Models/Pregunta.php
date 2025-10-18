<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pregunta extends Model
{
    use HasFactory;

    protected $fillable = [
        'pais',
        'enunciado', 
        'respuesta'
    ];

    // Relación para las categorías a través de la tabla pivot
    public function categoriasPivot()
    {
        return $this->hasMany(\App\Models\CategoriaPregunta::class);
    }

    // Accesor para obtener categorías como array
    public function getCategoriasAttribute()
    {
        return $this->categoriasPivot->pluck('categoria');
    }
}