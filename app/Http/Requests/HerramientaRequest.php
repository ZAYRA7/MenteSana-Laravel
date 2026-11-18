<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class HerramientaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo'      => 'required|string|max:255',
            'tipo'        => 'required|string|max:100',
            'enlace'      => 'required|url|max:255',
            'descripcion' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'titulo.required'      => 'El título es obligatorio.',
            'tipo.required'        => 'El tipo es obligatorio.',
            'enlace.required'      => 'El enlace es obligatorio.',
            'enlace.url'           => 'El enlace debe ser una URL válida (https://...).',
            'descripcion.required' => 'La descripción es obligatoria.',
        ];
    }
}