<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('excels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('llamada')->nullable();
            $table->string('numeroA')->nullable();
            $table->string('radio_baseA')->nullable();
            $table->string('coordenadaA')->nullable();
            $table->string('numeroB')->nullable();
            $table->string('radio_baseB')->nullable();
            $table->string('coordenadaB')->nullable();
            $table->string('fecha')->nullable();
            $table->string('tiempo')->nullable();
            $table->string('identificador')->nullable();
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
        Schema::dropIfExists('excels');
    }
}
