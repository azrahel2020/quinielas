<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateQuinielaRequest extends FormRequest
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
            'name' => 'required|max:255',
            'inicio' => 'required|date',
            'final' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'status' => 'required|in:Activa,Inactiva',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'El nombre de la quiniela es requerido.',
            'inicio.required' => 'La fecha de inicio es requerida.',
            'inicio.date' => 'La fecha de inicio debe ser una fecha válida.',
            'final.required' => 'La fecha final es requerida.',
            'final.date' => 'La fecha final debe ser una fecha válida.',
            'final.after' => 'La fecha final debe ser posterior a la fecha de inicio.',
            'image.image' => 'El archivo debe ser una imagen válida.',
            'image.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg o gif.',
            'image.max' => 'La imagen no puede tener un tamaño superior a 2MB.',
            'status.required' => 'El estado de la quiniela es requerido.',
            'status.in' => 'El estado de la quiniela debe ser activa o inactiva.',
        ];
    }
}
