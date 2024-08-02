<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Venta extends Model
{
    use HasFactory;

    //Refinir la llave primaria
    protected $primaryKey = 'ID_Venta';

    protected $fillable = [
        'Fecha',
        'ID_Producto',
        'Cantidad',
        'Monto_Total',
        'ID_Comerciante',
    ];

    public function comerciante()
    {
        return $this->belongsTo(Comerciante::class, 'ID_Comerciante');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'ID_Producto');
    }
}
