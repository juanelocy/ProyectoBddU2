<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('productos', function (Blueprint $table) {
            $table->bigIncrements('ID_Producto');
            $table->string('Nombre', 100);
            $table->string('Categoría', 50);
            $table->decimal('Precio', 10, 2);
            $table->integer('Stock');
            $table->date('Fecha_Entrada');
            $table->date('Fecha_Caducidad');
            $table->unsignedBigInteger('ID_Comerciante');
            $table->timestamps(0);

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
        Schema::dropIfExists('productos');
    }
}
