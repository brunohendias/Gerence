<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecoInscTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('endereco_insc', function (Blueprint $table) {
            $table->bigIncrements('cod_endereco_insc');
            $table->foreignId('cod_insc')->references('cod_insc')->on('inscricao');
            $table->string('estado', 2);
            $table->string('cidade', 90);
            $table->string('bairro', 90);
            $table->string('rua', 90);
            $table->integer('numero');
            $table->string('cep', 8)->nullable();
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
        Schema::dropIfExists('endereco_insc');
    }
}
