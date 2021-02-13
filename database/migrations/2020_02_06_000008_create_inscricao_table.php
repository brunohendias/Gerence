<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInscricaoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricao', function (Blueprint $table) {
            $table->bigIncrements('cod_insc');
            $table->string('nom_insc', 90);
            $table->date('data_nasci');
            $table->string('email');
            $table->string('telefone', 14);
            $table->string('cpf', 14);
            $table->string('rg', 20);
            $table->string('nom_mae', 90);
            $table->string('nom_pai', 90)->nullable();
            $table->foreignId('cod_serie')->references('cod_serie')->on('serie');
            $table->foreignId('cod_atencao')->references('cod_atencao')->on('atencao');
            $table->foreignId('cod_turno')->references('cod_turno')->on('turno');
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
        Schema::dropIfExists('inscricao');
    }
}
