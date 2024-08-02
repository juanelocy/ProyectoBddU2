<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gasto extends Model
{
    use HasFactory;

    //Redifine primary key
    protected $primaryKey = 'ID_Gasto';

    //Definir la tabla
    protected $table = 'gastos';

    //Fillable attributes
    protected $fillable = [
        'Fecha',
        'Descripción',
        'Monto',
        'Tipo'
    ];

}
