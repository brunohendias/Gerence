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
            $table->bigInteger('cod_serie');
            $table->bigInteger('cod_turno');
            $table->bigInteger('cod_turma');
            $table->foreign('cod_serie')->references('cod_serie')->on('serie');
            $table->foreign('cod_turno')->references('cod_turno')->on('turno');
            $table->foreign('cod_turma')->references('cod_turma')->on('turma');
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
