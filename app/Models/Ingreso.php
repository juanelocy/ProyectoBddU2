<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ingreso extends Model
{
    use HasFactory;

    //Redifine primary key
    protected $primaryKey = 'ID_Ingreso';


    //Definir la tabla
    protected $table = 'ingresos';

    //Fillable attributes
    protected $fillable = [
        'Fecha',
        'Descripción',
        'Monto',
        'Fuente',
    ];
}
