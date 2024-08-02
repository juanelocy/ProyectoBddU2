<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIngresosTable extends Migration
{
    public function up()
    {
        Schema::create('ingresos', function (Blueprint $table) {
            $table->bigIncrements('ID_Ingreso');
            $table->date('Fecha');
            $table->string('Descripción');
            $table->decimal('Monto', 10, 2);
            $table->string('Fuente');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('ingresos');
    }
}
