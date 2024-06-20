<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateGameRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'home_team_id' => 'required|exists:teams,id',
            'away_team_id' => 'required|exists:teams,id|different:home_team_id',
            'date' => 'required|date',
            'stadium' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'home_team_id.required' => 'El equipo local es obligatorio.',
            'home_team_id.exists' => 'El equipo local seleccionado no es válido.',
            'away_team_id.required' => 'El equipo visitante es obligatorio.',
            'away_team_id.exists' => 'El equipo visitante seleccionado no es válido.',
            'away_team_id.different' => 'El equipo visitante debe ser diferente del equipo local.',
            'date.required' => 'La fecha del juego es obligatoria.',
            'date.date' => 'La fecha del juego no es válida.',
            'stadium.required' => 'El estadio es obligatorio.',
            'stadium.string' => 'El estadio debe ser una cadena de texto.',
            'stadium.max' => 'El estadio no puede tener más de 255 caracteres.',
        ];
    }
}
