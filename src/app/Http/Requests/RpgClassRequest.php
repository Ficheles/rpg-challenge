<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RpgClassRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome da classe é obrigatório.',
            'name.string' => 'O nome da classe deve ser um texto.',
            'name.max' => 'O nome da classe deve ter no máximo 255 caracteres.',
        ];
    }
}