<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('preguntas', function (Blueprint $table) {
            $table->id();
            $table->string('pais'); // Identificador (nombre del país)
            $table->text('enunciado'); // El texto de la pregunta
            $table->enum('categoria', ['CRI', 'PE', 'CSIS', 'AMACSS', 'DAE']);
            $table->string('respuesta'); // La respuesta correcta
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('preguntas');
    }
};