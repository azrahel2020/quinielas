<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBetRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'bets' => 'required|array', // Debe ser un arreglo
            'bets.*.bets_home' => 'required|integer|min:0', // Apuesta local debe ser un número entero positivo
            'bets.*.bets_away' => 'required|integer|min:0', // Apuesta visitante debe ser un número entero positivo
        ];
    }

    public function messages()
    {
        return [
            'bets.required' => 'Se requiere al menos una apuesta.', // Mensaje personalizado para la regla 'required'
            'bets.array' => 'El formato de las apuestas no es válido.', // Mensaje personalizado para la regla 'array'
            'bets.*.bets_home.required' => 'La apuesta local es requerida.', // Mensaje personalizado para la regla 'required' dentro de un arreglo
            'bets.*.bets_home.integer' => 'La apuesta local debe ser un número entero.',
            'bets.*.bets_home.min' => 'La apuesta local debe ser al menos :min.',
            'bets.*.bets_away.required' => 'La apuesta visitante es requerida.',
            'bets.*.bets_away.integer' => 'La apuesta visitante debe ser un número entero.',
            'bets.*.bets_away.min' => 'La apuesta visitante debe ser al menos :min.',
        ];
    }
}
