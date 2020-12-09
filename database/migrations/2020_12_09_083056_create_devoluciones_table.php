<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDevolucionesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('devoluciones', function (Blueprint $table) {
            $table->foreignId('movimiento_id')->constrained();
            $table->unsignedBigInteger('prestamo_id');
            $table->softDeletes();
            $table->foreign('prestamo_id')->references('movimiento_id')->on('prestamos')->onDelete('restrict');
            $table->primary('movimiento_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devoluciones');
    }
}
