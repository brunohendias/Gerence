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
            $table->foreignId('cod_aluno')->references('cod_aluno')->on('aluno');
            $table->foreignId('cod_serie')->references('cod_serie')->on('serie');
            $table->foreignId('cod_prof')->references('cod_prof')->on('professor');
            $table->foreignId('cod_situacao')->references('cod_situacao')->on('situacao');
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
