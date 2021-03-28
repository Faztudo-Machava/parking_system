<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateViaturasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('viatura', function (Blueprint $table) {
            $table->id();
            $table->foreignId('tipo')->nullable(false)->constrained('tipo_viatura', 'id');
            $table->foreignId('modelo')->nullable(false)->constrained('modelo', 'id');
            $table->foreignId('cor')->nullable(false)->constrained('cor','id');
            $table->tinyInteger('estado')->default(1);
            $table->date('data');
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
        Schema::dropIfExists('viatura');
    }
}
