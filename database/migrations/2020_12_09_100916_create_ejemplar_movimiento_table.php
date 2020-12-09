<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEjemplarMovimientoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ejemplar_movimiento', function (Blueprint $table) {
            $table->foreignId('ejemplar_id')->constrained('ejemplares')->onDelete('restrict');
            $table->foreignId('movimiento_id')->constrained()->onDelete('restrict');
            $table->primary(['ejemplar_id', 'movimiento_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ejemplar_movimiento');
    }
}
