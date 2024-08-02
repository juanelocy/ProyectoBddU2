<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inspeccion extends Model
{
    use HasFactory;

    //Primary Key
    protected $primaryKey = 'ID_Inspeccion';

    //Table name
    protected $table = 'inspecciones';

    //Fillable
    protected $fillable = [
        'Fecha',
        'ID_Puesto',
        'Resultado'
    ];

    //Relacion 1:N
    public function puesto(){
        return $this->belongsTo('App\Models\Puesto', 'ID_Puesto');
    }
}
