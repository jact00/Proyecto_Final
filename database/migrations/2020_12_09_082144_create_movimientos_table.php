<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMovimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movimientos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('alumno_id');
            $table->unsignedBigInteger('operador_id');
            $table->boolean('es_prestamo')->defaul(true);
            $table->timestamps();
            $table->softDeletes();
            $table->foreign('alumno_id')->references('user_id')->on('alumnos')->onDelete('restrict');
            $table->foreign('operador_id')->references('user_id')->on('operadores')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimientos');
    }
}
