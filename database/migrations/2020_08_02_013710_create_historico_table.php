<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHistoricoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('historico', function (Blueprint $table) {
            $table->bigIncrements('cod_historico');
            $table->bigInteger('cod_aluno');
            $table->bigInteger('cod_serie');
            $table->bigInteger('cod_prof');
            $table->bigInteger('cod_situacao');
            $table->foreign('cod_aluno')->references('cod_aluno')->on('aluno');
            $table->foreign('cod_serie')->references('cod_serie')->on('serie');
            $table->foreign('cod_prof')->references('cod_prof')->on('professor');
            $table->foreign('cod_situacao')->references('cod_situacao')->on('situacao');
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
        Schema::dropIfExists('historico');
    }
}
