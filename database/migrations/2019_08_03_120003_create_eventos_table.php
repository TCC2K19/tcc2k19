<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('eventos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nome');
            $table->string('local');
            $table->time('inicio');
            $table->time('fim');
            $table->date('data');
            $table->string('responsavel');
            $table->string('tipo_evento');
            $table->integer('vagas')->unsigned();
            $table->integer('vagasPreenchidas')->unsigned()->default(0);
            $table->string('publico_alvo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('eventos');
    }
}
