<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::create('categoria_pregunta', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pregunta_id')->constrained()->onDelete('cascade');
            $table->enum('categoria', ['CRI', 'PE', 'CSIS', 'AMACSS', 'DAE']);
            $table->timestamps();
            
            $table->unique(['pregunta_id', 'categoria']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('categoria_pregunta');
    }
};