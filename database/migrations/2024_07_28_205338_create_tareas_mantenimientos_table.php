<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tareas_mantenimiento', function (Blueprint $table) {
            $table->bigIncrements('ID_Tarea_Mantenimiento');
            $table->unsignedBigInteger('ID_Mantenimiento'); // ID del mantenimiento relacionado
            $table->string('descripcion'); // Descripción de la tarea
            $table->date('fecha_programada'); // Fecha programada para la tarea
            $table->date('fecha_realizada');
            $table->timestamps(); // Timestamps para created_at y updated_at

            // Definir la clave foránea que referencia a la tabla mantenimientos
            $table->foreign('ID_Mantenimiento')
                ->references('ID_Mantenimiento')
                ->on('mantenimientos')
                ->onDelete('cascade'); // Opcional: Elimina las tareas si se elimina el mantenimiento asociado
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tareas_mantenimiento');
    }
};
