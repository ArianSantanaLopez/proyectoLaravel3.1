<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    // $fillable protege tu base de datos y permite guardar datos del formulario de forma segura.
    protected $fillable = [
        'fecha',
        'hora',
        'local',
        'visitante',
        'ubicacion',
        'notas',
    ];
}
