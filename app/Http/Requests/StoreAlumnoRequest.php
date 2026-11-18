<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreAlumnoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'matricula'    => 'required|string|max:20|unique:alumnos,matricula',
            'nombre'       => 'required|string|max:255',
            'carrera'      => 'required|string|max:150',
            'cuatrimestre' => 'required|string|max:50',
            'ultimo_animo' => 'required|string|max:100',
        ];
    }
}
