<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCandidatoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('candidato', function (Blueprint $table) {
            $table->bigIncrements('cod_can');
            $table->char('nom_can', 50);
            $table->char('email', 50);
            $table->char('telefone', 20);
            $table->char('cpf', 14)->uniqid();
            $table->char('ind_aluno', 1)->default('N');
            $table->foreignId('cod_serie')->references('cod_serie')->on('serie');
            $table->foreignId('cod_turno')->references('cod_turno')->on('turno');
            $table->foreignId('cod_turma')->references('cod_turma')->on('turma');
            $table->foreignId('cod_prof')->references('cod_prof')->on('professor');
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
        Schema::dropIfExists('candidato');
    }
}
