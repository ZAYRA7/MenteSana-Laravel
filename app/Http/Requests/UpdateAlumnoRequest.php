<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateAlumnoRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        $alumnoId = $this->route('alumno')->id ?? $this->route('alumno');

        return [
            'matricula'    => 'required|string|max:20|unique:alumnos,matricula,' . $alumnoId,
            'nombre'       => 'required|string|max:255',
            'carrera'      => 'required|string|max:150',
            'cuatrimestre' => 'required|string|max:50',
            'ultimo_animo' => 'required|string|max:100',
        ];
    }
}
