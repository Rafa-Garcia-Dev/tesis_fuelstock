<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    use HasFactory;

    protected $fillable =[
        'fecha_compra',
            'numero_factura',
            'volumen_galones_factura_corriente',
            'galones_antes_descargue_corriente',
            'galones_despues_descargue_corriente',
            'ventas_realizas_descargue_correinte',
            'volumen_galones_factura_extra',
            'galones_antes_descargue_extra',
            'galones_despues_descargue_extra',
            'ventas_realizas_descargue_extra',
            'volumen_galones_factura_diesel',
            'galones_antes_descargue_diesel',
            'galones_despues_descargue_diesel',
            'ventas_realizas_descargue_diesel',
    ];
}
