<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categoria extends Model
{
    use HasFactory;

    protected $fillable = ['categoria'];

    public $timestamps = false;

    // Relación muchos a muchos con preguntas
    public function preguntas()
    {
        return $this->belongsToMany(Pregunta::class, 'categoria_pregunta', 'categoria', 'pregunta_id');
    }
}