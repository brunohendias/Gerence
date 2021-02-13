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
            $table->collation = 'utf8_general_ci';
            $table->charset = 'utf8';
            $table->bigIncrements('codaluno');
            $table->char('nomaluno', 50);
            $table->char('email', 50);
            $table->char('telefone', 20);
            $table->char('cpf', 14)->uniqid();
            $table->char('num_matricula', 10)->uniqid();
            $table->char('ind_formado', 1)->default('N');
            $table->bigInteger('codcan')->unsigned();
            $table->bigInteger('codserie')->unsigned();
            $table->bigInteger('codturno')->unsigned();
            $table->bigInteger('codturma')->unsigned();
            $table->bigInteger('codprof')->unsigned();
            $table->bigInteger('codatencao')->unsigned();
            $table->bigInteger('codsituacao')->unsigned();
            $table->foreign('codcan')->references('codcan')->on('candidato');
            $table->foreign('codserie')->references('codserie')->on('serie');
            $table->foreign('codturno')->references('codturno')->on('turno');
            $table->foreign('codturma')->references('codturma')->on('turma');
            $table->foreign('codprof')->references('codprof')->on('professor');
            $table->foreign('codatencao')->references('codatencao')->on('atencao');
            $table->foreign('codsituacao')->references('codsituacao')->on('situacao');
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
