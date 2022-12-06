<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courses', function (Blueprint $table) { // GENERACIÓN DE LA TABLA CURSO
            $table->increments('id');
            $table->timestamps();
            $table->string('name_course');
            $table->unsignedInteger('prof_course');

            $table->foreign('prof_course')->references('id')->on('professors'); // FK prof_course -> id / profesors
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courses');
    }
};
