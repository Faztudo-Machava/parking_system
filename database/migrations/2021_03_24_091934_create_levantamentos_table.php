<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLevantamentosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('levantamento', function (Blueprint $table) {
            $table->id();
            $table->foreignId('parqueamento')->nullable(false)->constrained('parqueamento', 'id');
            $table->foreignId('utilizador')->nullable(false)->constrained('utilizador', 'id');
            $table->date('data');
            $table->tinyInteger('estado')->default(1);
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
        Schema::dropIfExists('levantamento');
    }
}
