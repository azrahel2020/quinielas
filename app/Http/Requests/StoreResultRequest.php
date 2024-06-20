<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreResultRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize()
    {
        return true; // Cambia esto según tus reglas de autorización
    }

    public function rules()
    {
        return [
            'results' => 'required|array',
            'results.*.result_home' => 'nullable|integer|min:0',
            'results.*.result_away' => 'nullable|integer|min:0',
        ];
    }

    public function messages()
    {
        return [
            'results.required' => 'Se requiere al menos un resultado.',
            'results.array' => 'El formato de los resultados no es válido.',
            'results.*.result_home.integer' => 'El resultado del equipo local debe ser un número entero.',
            'results.*.result_home.min' => 'El resultado del equipo local debe ser al menos :min.',
            'results.*.result_away.integer' => 'El resultado del equipo visitante debe ser un número entero.',
            'results.*.result_away.min' => 'El resultado del equipo visitante debe ser al menos :min.',
        ];
    }
}
