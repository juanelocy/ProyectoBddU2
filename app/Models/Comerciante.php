<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comerciante extends Model
{
    use HasFactory;

    //Redifinir la llave primaria
    protected $primaryKey = 'ID_Comerciante';


    protected $fillable = [
        'Nombre',
        'Datos_Contacto',
        'Tipo_Productos',
    ];

    public function arrendamientos()
    {
        return $this->hasMany(Arrendamiento::class, 'ID_Comerciante');
    }

    public function productos()
    {
        return $this->hasMany(Producto::class, 'ID_Comerciante');
    }

    public function ventas()
    {
        return $this->hasMany(Venta::class, 'ID_Comerciante');
    }

}
