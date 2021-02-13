<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessorVTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor_v', function (Blueprint $table) {
            $table->bigIncrements('cod_prof_v');
            $table->bigInteger('cod_prof');
            $table->bigInteger('cod_serie');
            $table->bigInteger('cod_turno');
            $table->bigInteger('cod_atencao');
            $table->foreign('cod_prof')->references('cod_prof')->on('professor');
            $table->foreign('cod_serie')->references('cod_serie')->on('serie');
            $table->foreign('cod_turno')->references('cod_turno')->on('turno');
            $table->foreign('cod_atencao')->references('cod_atencao')->on('atencao');
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
        Schema::dropIfExists('professor_v');
    }
}
