<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerieDisciplinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serie_disciplina', function (Blueprint $table) {
            $table->bigIncrements('cod_serie_disc');
            $table->foreignId('cod_serie')->references('cod_serie')->on('serie');
            $table->foreignId('cod_disciplina')->references('cod_disciplina')->on('disciplina');
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
        Schema::dropIfExists('serie_disciplina');
    }
}
