<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'titulo'      => 'required|string|max:255',
            'fecha'       => 'required|date',
            'hora'        => 'required',
            'lugar'       => 'required|string|max:255',
            'descripcion' => 'nullable|string|max:1000',
            'tipo'        => 'required|string|max:100',
        ];
    }
}