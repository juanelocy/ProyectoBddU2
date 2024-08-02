<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TareasMantenimiento extends Model
{
    use HasFactory;

    //Primary Key
    protected $primaryKey = 'ID_Tarea_Mantenimiento';

    //Table
    protected $table = 'tareas_mantenimiento';

    //Fillable
    protected $fillable = [
        'ID_Mantenimiento', 'descripcion', 'fecha_programada', 'fecha_realizada'
    ];

    //Relacion 1 a 1
    public function mantenimiento(){
        return $this->belongsTo('App\Models\Mantenimiento', 'ID_Mantenimiento');
    }
}
