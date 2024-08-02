<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePagosTable extends Migration
{
    public function up()
    {
        Schema::create('pagos', function (Blueprint $table) {
            $table->bigIncrements('ID_Pago');
            $table->unsignedBigInteger('ID_Arrendamiento');
            $table->date('Fecha');
            $table->decimal('Monto', 10, 2);
            $table->string('Método_Pago', 50);
            $table->timestamps();

            $table->foreign('ID_Arrendamiento')->references('ID_Arrendamiento')->on('arrendamientos')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::dropIfExists('pagos');
    }
}
