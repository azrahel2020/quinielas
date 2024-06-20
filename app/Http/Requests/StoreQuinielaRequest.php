<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreQuinielaRequest extends FormRequest
{
    public function authorize()
    {
        return true; // Cambia esto según tus necesidades de autorización
    }

    public function rules()
    {
        return [
            'name' => 'required|unique:quinielas|max:255',
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
            'name.unique' => 'Ya existe una quiniela con este nombre.',
            'inicio.required' => 'La fecha de inicio es requerida.',
            'inicio.date' => 'La fecha de inicio debe ser una fecha válida.',
            'final.required' => 'La fecha final es requerida.',
            'final.date' => 'La fecha final debe ser una fecha válida.',
            'image.image' => 'El archivo debe ser una imagen válida.',
            'image.mimes' => 'La imagen debe ser de tipo: jpeg, png, jpg o gif.',
            'image.max' => 'La imagen no puede tener un tamaño superior a 2MB.',
            'status.required' => 'El estado de la quiniela es requerido.',
            'status.in' => 'El estado de la quiniela debe ser activa o inactiva.',
        ];
    }
}
