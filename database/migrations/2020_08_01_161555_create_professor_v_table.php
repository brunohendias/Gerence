<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProfessorVTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('professor_v', function (Blueprint $table) {
            $table->collation = 'utf8_general_ci';
            $table->charset = 'utf8';
            $table->bigIncrements('codprof_v');
            $table->bigInteger('codprof')->unsigned();
            $table->bigInteger('codserie')->unsigned();
            $table->bigInteger('codturno')->unsigned();
            $table->bigInteger('codatencao')->unsigned();
            $table->foreign('codprof')->references('codprof')->on('professor');
            $table->foreign('codserie')->references('codserie')->on('serie');
            $table->foreign('codturno')->references('codturno')->on('turno');
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
        Schema::dropIfExists('professor_v');
    }
}
