<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    //Refinir la llave primaria
    protected $primaryKey = 'ID_Producto';

    protected $fillable = [
        'Nombre',
        'Categoría',
        'Precio',
        'Stock',
        'Fecha_Entrada',
        'Fecha_Caducidad',
        'ID_Comerciante',
    ];

    public function comerciante()
    {
        return $this->belongsTo(Comerciante::class, 'ID_Comerciante');
    }


    public function inventarios()
    {
        return $this->hasMany(Inventario::class, 'ID_Producto');
    }
    public function ventas()
    {
        return $this->hasMany(Venta::class, 'ID_Producto');
    }
}

