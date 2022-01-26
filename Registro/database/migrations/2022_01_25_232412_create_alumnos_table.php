<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlumnosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alumnos', function (Blueprint $table) {
            $table->id();
            $table->string("nombre",100);
            $table->date("fecha_nacimiento");
            $table->string("observacion",300);
            $table->integer('sexo_id')->unsigned()->foreign()->references('id')->on('sexo')->onDelete('cascade');
            $table->integer('grado_id')->unsigned()->foreign()->references('id')->on('grado')->onDelete('cascade');
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
        Schema::dropIfExists('alumnos');
    }
}
