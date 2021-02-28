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
            $table->bigIncrements('cod_can');
            $table->char('nom_can', 50);
            $table->char('email', 50)->nullable();
            $table->char('telefone', 20);
            $table->char('cpf', 14)->uniqid();
            $table->foreignId('cod_serie_v')->references('cod_serie_v')->on('serie_v');
            $table->foreignId('cod_atencao')->references('cod_atencao')->on('atencao');
            $table->foreignId('cod_insc')->references('cod_insc')->on('inscricao');
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
