<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInscricoesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inscricoes', function (Blueprint $table) {
            $table->bigInteger('usuario')->unsigned();
            $table->bigInteger('evento')->unsigned();
            $table->bigInteger('usr_turma')->unsigned();
            $table->bigInteger('evt_turma')->unsigned();
            $table->primary(['usuario', 'evento', 'usr_turma', 'evt_turma']);
        });

        Schema::table('inscricoes', function (Blueprint $table) {
            $table->foreign('usuario')->references('id')->on('users');
            $table->foreign('evento')->references('evento')->on('disponibilizacoes');
            $table->foreign('usr_turma')->references('turma')->on('users');
            $table->foreign('evt_turma')->references('turma')->on('disponibilizacoes');
        });

        DB::statement('ALTER TABLE inscricoes ADD CONSTRAINT usr_evt_turma_ck CHECK (usr_turma = evt_turma);');


    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inscricoes');
    }
}
