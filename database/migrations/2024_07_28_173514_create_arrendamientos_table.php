<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateArrendamientosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('arrendamientos', function (Blueprint $table) {
            $table->bigIncrements('ID_Arrendamiento');
            $table->unsignedBigInteger('ID_Puesto');
            $table->unsignedBigInteger('ID_Comerciante');
            $table->date('Fecha_Inicio');
            $table->date('Fecha_Fin');
            $table->decimal('Monto', 10, 2);
            $table->timestamps(0);

            $table->foreign('ID_Puesto')->references('ID_Puesto')->on('puestos')->onDelete('cascade');
            $table->foreign('ID_Comerciante')->references('ID_Comerciante')->on('comerciantes')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('arrendamientos');
    }
}
