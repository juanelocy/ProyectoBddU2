<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInspeccionesTable extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('inspecciones', function (Blueprint $table) {
            $table->id('ID_Inspeccion'); // Clave primaria
            $table->date('Fecha'); // Fecha de la inspección
            $table->unsignedBigInteger('ID_Puesto'); // Clave foránea que referencia a la tabla 'puestos'
            $table->string('Resultado'); // Resultado de la inspección
            $table->timestamps(); // Created_at y updated_at

            // Definición de la clave foránea
            $table->foreign('ID_Puesto')
                ->references('ID_Puesto')
                ->on('puestos')
                ->onDelete('cascade'); // Elimina las inspecciones si se elimina el puesto relacionado
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('inspecciones', function (Blueprint $table) {
            $table->dropForeign(['ID_Puesto']); // Elimina la clave foránea
        });

        Schema::dropIfExists('inspecciones'); // Elimina la tabla
    }
}
