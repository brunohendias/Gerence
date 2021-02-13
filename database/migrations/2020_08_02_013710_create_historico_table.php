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
            $table->collation = 'utf8_general_ci';
            $table->charset = 'utf8';
            $table->bigIncrements('codhistorico');
            $table->bigInteger('codaluno')->unsigned();
            $table->bigInteger('codserie')->unsigned();
            $table->bigInteger('codprof')->unsigned();
            $table->bigInteger('codsituacao')->unsigned();
            $table->foreign('codaluno')->references('codaluno')->on('aluno');
            $table->foreign('codserie')->references('codserie')->on('serie');
            $table->foreign('codprof')->references('codprof')->on('professor');
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
        Schema::dropIfExists('historico');
    }
}
