<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDisponibilizacoesTable extends Migration
{
    public function up()
    {
        Schema::create('disponibilizacoes', function (Blueprint $table) {
            $table->bigInteger('evento')->unsigned();
            $table->bigInteger('turma')->unsigned();
            $table->primary(['evento', 'turma']);
        });

        Schema::table('disponibilizacoes', function (Blueprint $table) {
            $table->foreign('evento')->references('id')->on('eventos')->onDelete('cascade');;
            $table->foreign('turma')->references('id')->on('turmas')->onDelete('cascade');;
        });
    }

    public function down()
    {
        Schema::dropIfExists('disponibilizacoes');
    }
}
