<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriaPregunta extends Model
{
    use HasFactory;

    protected $table = 'categoria_pregunta';

    protected $fillable = ['pregunta_id', 'categoria'];

    public $timestamps = false;

    public function pregunta()
    {
        return $this->belongsTo(Pregunta::class);
    }
}