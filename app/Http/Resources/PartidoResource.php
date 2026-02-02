<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PartidoResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'equipo_local' => $this->equipo_local,
            'equipo_visitante' => $this->equipo_visitante,
            'fecha' => $this->fecha,
            'resultado' => $this->resultado,
        ];
    }
}