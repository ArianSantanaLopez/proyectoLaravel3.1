<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class StorePartidoRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'equipo_local' => 'required|string|max:255',
            'equipo_visitante' => 'required|string|max:255',
            'fecha' => 'required|date',
            'resultado' => 'nullable|string|max:50',
        ];
    }
}