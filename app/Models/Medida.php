<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medida extends Model
{
    use HasFactory;

    protected $fillable =[
        'fecha_medida',
        'galones_al_cierre_corriente',
        'galones_al_cierre_extra',
        'galones_al_cierre_diesel',
    ];
}
