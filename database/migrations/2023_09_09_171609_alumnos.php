<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Alumnos extends Migration
{
    /**
     * Run the migrations.
     * 
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('DPI');
            $table->string('NOMBRE');
            $table->string('APELLIDO');
            $table->string('EMAIL');
            $table->string('CARNE');
            $table->string('FACULTAD');
            $table->string('CICLO');
            $table->timestamps();
        });
    }

    /**
     * Reservese the migrations.
     * 
     * @return void
     */
    public function down()
    {
        //Schema::dropIfExists('alumnos');
    }
}
