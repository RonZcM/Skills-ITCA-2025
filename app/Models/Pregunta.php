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
        'categoria',
        'respuesta'
    ];

    protected $casts = [
        'categoria' => 'string'
    ];
}