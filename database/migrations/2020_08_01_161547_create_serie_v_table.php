<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerieVTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serie_v', function (Blueprint $table) {
            $table->bigIncrements('cod_serie_v');
            $table->integer('qtd_alunos')->default(0);
            $table->integer('limite_alunos')->default(20);
            $table->foreignId('cod_serie')->references('cod_serie')->on('serie');
            $table->foreignId('cod_turno')->references('cod_turno')->on('turno');
            $table->foreignId('cod_turma')->references('cod_turma')->on('turma');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('serie_v');
    }
}
