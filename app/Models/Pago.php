<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    //Redifinir la llave primaria
    protected $primaryKey = 'ID_Pago';

    //Fillable
    protected $fillable = [
        'ID_Arrendamiento',
        'Fecha',
        'Monto',
        'Método_Pago'
    ];

    public function arrendamiento(){
        return $this->belongsTo(Arrendamiento::class, 'ID_Arrendamiento');
    }
}
