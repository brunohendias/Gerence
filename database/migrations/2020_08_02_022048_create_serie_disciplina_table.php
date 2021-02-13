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
            $table->collation = 'utf8_general_ci';
            $table->charset = 'utf8';
            $table->bigIncrements('cod_serie_disc');
            $table->bigInteger('codserie')->unsigned();
            $table->bigInteger('coddisciplina')->unsigned();
            $table->foreign('codserie')->references('codserie')->on('serie');
            $table->foreign('coddisciplina')->references('coddisciplina')->on('disciplina');
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
