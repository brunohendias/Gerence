<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSerieVTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('serie_v', function (Blueprint $table) {
            $table->collation = 'utf8_general_ci';
            $table->charset = 'utf8';
            $table->bigIncrements('codserie_v');
            $table->integer('qtd_alunos')->default(0);
            $table->integer('limite_alunos')->default(20);
            $table->bigInteger('codserie')->unsigned();
            $table->bigInteger('codturno')->unsigned();
            $table->bigInteger('codturma')->unsigned();
            $table->foreign('codserie')->references('codserie')->on('serie');
            $table->foreign('codturno')->references('codturno')->on('turno');
            $table->foreign('codturma')->references('codturma')->on('turma');
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
        Schema::dropIfExists('serie_v');
    }
}
