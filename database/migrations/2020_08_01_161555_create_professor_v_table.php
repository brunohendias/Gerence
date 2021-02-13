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
            $table->foreignId('cod_prof')->references('cod_prof')->on('professor');
            $table->foreignId('cod_serie')->references('cod_serie')->on('serie');
            $table->foreignId('cod_turno')->references('cod_turno')->on('turno');
            $table->foreignId('cod_atencao')->references('cod_atencao')->on('atencao');
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
