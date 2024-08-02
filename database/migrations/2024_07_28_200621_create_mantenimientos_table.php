<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMantenimientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mantenimientos', function (Blueprint $table) {
            $table->bigIncrements('ID_Mantenimiento');
            $table->date('Fecha');
            $table->text('Descripción');
            $table->string('Estado', 20);
            $table->unsignedBigInteger('ID_Puesto');
            $table->timestamps();

            $table->foreign('ID_Puesto')->references('ID_Puesto')->on('puestos')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('mantenimientos', function (Blueprint $table) {
            $table->dropForeign(['ID_Puesto']);
        });
        Schema::dropIfExists('mantenimientos');
    }
}
