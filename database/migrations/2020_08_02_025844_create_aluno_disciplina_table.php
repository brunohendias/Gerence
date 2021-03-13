<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlunoDisciplinaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('aluno_disciplina', function (Blueprint $table) {
            $table->bigIncrements('cod_aluno_disc');
            $table->decimal('nota', 3, 2);
            $table->foreignId('cod_aluno')->references('cod_aluno')->on('aluno');
            $table->foreignId('cod_serie_disc')->references('cod_serie_disc')->on('serie_disciplina');
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
        Schema::dropIfExists('aluno_disciplina');
    }
}
