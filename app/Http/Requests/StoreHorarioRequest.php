<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreHorarioRequest extends FormRequest
{
    // Permite que cualquier usuario en sesión use esta validación
    public function authorize(): bool
    {
        return true;
    }

    // Reglas de validación para crear un horario
    public function rules(): array
    {
        return [
            'dia' => 'required|string|max:255',
            'hora_inicio' => 'required|date_format:H:i',
            'hora_fin' => 'required|date_format:H:i|after:hora_inicio',
            'estado' => 'required|string|in:Disponible,No disponible',
        ];
    }
}
