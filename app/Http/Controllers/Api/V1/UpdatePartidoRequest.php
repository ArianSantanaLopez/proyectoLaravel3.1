<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePartidoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'equipo_local' => 'sometimes|required|string|max:255',
            'equipo_visitante' => 'sometimes|required|string|max:255',
            'fecha' => 'sometimes|required|date',
            'resultado' => 'nullable|string|max:50',
        ];
    }
}