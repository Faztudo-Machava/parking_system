<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateParqueamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parqueamento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cliente')->nullable(false)->constrained('cliente', 'id');
            $table->foreignId('viatura')->nullable(false)->constrained('viatura', 'id');
            $table->foreignId('vaga')->nullable(false)->constrained('vaga', 'id');
            $table->foreignId('utilizador')->nullable(false)->constrained('utilizador', 'id');
            $table->date('data');
            $table->tinyInteger('estado');
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
        Schema::dropIfExists('parqueamento');
    }
}
