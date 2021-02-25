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
            $table->char('email', 50)->nullable();
            $table->char('telefone', 20);
            $table->char('cpf', 14)->uniqid();
            $table->char('num_matricula', 10)->uniqid();
            $table->char('ind_formado', 1)->default('N');
            $table->foreignId('cod_can')->references('cod_can')->on('candidato');
            $table->foreignId('cod_serie_v')->references('cod_serie_v')->on('serie_v');
            $table->foreignId('cod_atencao')->references('cod_atencao')->on('atencao');
            $table->foreignId('cod_situacao')->references('cod_situacao')->on('situacao_aluno');
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
