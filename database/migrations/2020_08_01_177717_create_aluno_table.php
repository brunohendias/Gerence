<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno', function (Blueprint $table) {
            $table->bigIncrements('cod_aluno');
            $table->char('nom_aluno', 50);
            $table->char('email', 50);
            $table->char('telefone', 20);
            $table->char('cpf', 14)->uniqid();
            $table->char('num_matricula', 10)->uniqid();
            $table->char('ind_formado', 1)->default('N');
            $table->bigInteger('cod_can');
            $table->bigInteger('cod_serie');
            $table->bigInteger('cod_turno');
            $table->bigInteger('cod_turma');
            $table->bigInteger('cod_prof');
            $table->bigInteger('cod_atencao');
            $table->bigInteger('cod_situacao');
            $table->foreign('cod_can')->references('cod_can')->on('candidato');
            $table->foreign('cod_serie')->references('cod_serie')->on('serie');
            $table->foreign('cod_turno')->references('cod_turno')->on('turno');
            $table->foreign('cod_turma')->references('cod_turma')->on('turma');
            $table->foreign('cod_prof')->references('cod_prof')->on('professor');
            $table->foreign('cod_atencao')->references('cod_atencao')->on('atencao');
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
        Schema::dropIfExists('aluno');
    }
}
