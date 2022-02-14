<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTigosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tigos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('numero_usuario')->nullable();
            $table->string('nombre')->nullable();
            $table->bigInteger('ci')->nullable();

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
        Schema::dropIfExists('tigos');
    }
}
