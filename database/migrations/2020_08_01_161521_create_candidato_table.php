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
            $table->collation = 'utf8_general_ci';
            $table->charset = 'utf8';
            $table->bigIncrements('codcan');
            $table->char('nomcan', 50);
            $table->char('email', 50);
            $table->char('telefone', 20);
            $table->char('cpf', 14)->uniqid();
            $table->char('ind_aluno', 1)->default('N');
            $table->bigInteger('codserie')->unsigned();
            $table->bigInteger('codturno')->unsigned();
            $table->bigInteger('codturma')->unsigned();
            $table->bigInteger('codprof')->unsigned();
            $table->bigInteger('codatencao')->unsigned();
            $table->foreign('codserie')->references('codserie')->on('serie');
            $table->foreign('codturno')->references('codturno')->on('turno');
            $table->foreign('codturma')->references('codturma')->on('turma');
            $table->foreign('codprof')->references('codprof')->on('professor');
            $table->foreign('codatencao')->references('codatencao')->on('atencao');
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
