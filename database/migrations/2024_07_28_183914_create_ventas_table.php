<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVentasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ventas', function (Blueprint $table) {
            $table->bigIncrements('ID_Venta');
            $table->date('Fecha');
            $table->unsignedBigInteger('ID_Producto');
            $table->integer('Cantidad');
            $table->decimal('Monto_Total', 10, 2);
            $table->unsignedBigInteger('ID_Comerciante');
            $table->timestamps(0);

            $table->foreign('ID_Producto')->references('ID_Producto')->on('productos');
            $table->foreign('ID_Comerciante')->references('ID_Comerciante')->on('comerciantes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ventas');
    }
}
