<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CriaTableCarta extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('carta', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('usuario')->unsigned();
            $table->string('nome')->unique();
            $table->enum('cor', ['vermelho', 'verde', 'branco', 'azul', 'preto', 'incolor']);
            $table->text('descricao');
            $table->string('imagem');
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('usuario')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('carta');
    }
}
