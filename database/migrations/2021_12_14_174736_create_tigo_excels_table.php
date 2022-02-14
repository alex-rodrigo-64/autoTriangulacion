<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTigoExcelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tigo_excels', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('llamada')->nullable();
            $table->string('numeroA')->nullable();
            $table->string('numeroB')->nullable();
            $table->string('fecha')->nullable();
            $table->string('tiempo')->nullable();
            $table->string('ciudad')->nullable();
            $table->string('sitio')->nullable();
            $table->string('longitud')->nullable();
            $table->string('latitud')->nullable();
            $table->string('punto_cardinal')->nullable();
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
        Schema::dropIfExists('tigo_excels');
    }
}
