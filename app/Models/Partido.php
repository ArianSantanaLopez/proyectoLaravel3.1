<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Partido extends Model
{
    protected $fillable = [
        'fecha',
        'hora',
        'local',
        'visitante',
        'ubicacion',
        'notas',
    ];
}
