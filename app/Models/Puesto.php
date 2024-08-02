<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Puesto extends Model
{
    use HasFactory;

    //Redifinir la llave primaria
    protected $primaryKey = 'ID_Puesto';

    protected $fillable = [
        'Ubicacion',
        'Estado',
        'Precio_Alquiler',
        'Concesionario',
        'Contacto',
        'Productos',
        'Fecha_Ingreso',
        'Fecha_Salida',
    ];

    public function arrendamientos()
    {
        return $this->hasMany(Arrendamiento::class, 'ID_Puesto');
    }

    public function mantenimientos()
    {
        return $this->hasMany(Mantenimiento::class, 'ID_Puesto');
    }

    public function inspecciones()
    {
        return $this->hasMany(Inspeccion::class, 'ID_Puesto');
    }

}
