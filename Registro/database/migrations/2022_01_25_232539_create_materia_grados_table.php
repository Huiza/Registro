<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMateriaGradosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('materia_grados', function (Blueprint $table) {
            $table->id();
            $table->integer('materia_id')->unsigned()->foreign()->references('id')->on('materia')->onDelete('cascade');
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
        Schema::dropIfExists('materia_grados');
    }
}
