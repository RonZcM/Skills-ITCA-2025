<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('preguntas', function (Blueprint $table) {
            $table->dropColumn('categoria');
        });
    }

    public function down()
    {
        Schema::table('preguntas', function (Blueprint $table) {
            $table->enum('categoria', ['CRI', 'PE', 'CSIS', 'AMACSS', 'DAE'])->nullable();
        });
    }
};