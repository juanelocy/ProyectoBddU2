<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mantenimiento extends Model
{
    use HasFactory;

    //Primary Key
    protected $primaryKey = 'ID_Mantenimiento';

    //Fillable
    protected $fillable = [
        'Fecha',
        'Descripción',
        'Estado',
        'ID_Puesto'
    ];

    public function puesto()
    {
        return $this->belongsTo(Puesto::class, 'ID_Puesto');
    }

    public function tareas_mantemiento()
    {
        return $this->hasMany(TareasMantenimiento::class, 'ID_Mantemiento');
    }
}
