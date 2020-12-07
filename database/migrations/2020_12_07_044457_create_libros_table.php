<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLibrosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('libros', function (Blueprint $table) {
            $table->string('isbn', 13);
            $table->string('nombre', 100);
            $table->string('autor', 255)->default('anonimo');
            $table->string('editorial', 100);
            $table->unsignedSmallInteger('edicion');
            $table->year('anio');
            $table->unsignedSmallInteger('paginas');
            $table->timestamps();


            $table->primary('isbn');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('libros');
    }
}
