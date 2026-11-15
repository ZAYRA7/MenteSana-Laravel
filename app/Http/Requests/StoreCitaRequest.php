<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class StoreCitaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
{
    return true;
}

public function rules(): array
{
    return [
        'paciente' => 'required|string|max:100',
        'fecha' => 'required|date',
        'hora' => 'required',
        'psicologo' => 'required|string|max:100',
        'estado' => 'required|in:Pendiente,Confirmada,Cancelada'
    ];
}
}
