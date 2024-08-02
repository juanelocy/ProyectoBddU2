<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Arrendamiento extends Model
{
    use HasFactory;

    //Redifinir la llave primaria
    protected $primaryKey = 'ID_Arrendamiento';

    protected $fillable = [
        'ID_Puesto',
        'ID_Comerciante',
        'Fecha_Inicio',
        'Fecha_Fin',
        'Monto',
    ];

    public function puesto()
    {
        return $this->belongsTo(Puesto::class, 'ID_Puesto');
    }

    public function comerciante()
    {
        return $this->belongsTo(Comerciante::class, 'ID_Comerciante');
    }

    public function pagos()
    {
        return $this->hasMany(Pago::class, 'ID_Arrendamiento');
    }
}
