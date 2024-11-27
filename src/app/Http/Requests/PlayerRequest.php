<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PlayerRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'class_id' => 'required|exists:rpg_classes,id',
            'xp' => 'required|integer|between:1,100',
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'O nome do jogador é obrigatório.',
            'name.string' => 'O nome do jogador deve ser um texto.',
            'name.max' => 'O nome do jogador deve ter no máximo 255 caracteres.',
            'class_id.required' => 'A classe do jogador é obrigatória.',
            'class_id.exists' => 'A classe selecionada não existe.',
            'xp.required' => 'O XP do jogador é obrigatório.',
            'xp.integer' => 'O XP deve ser um número inteiro.',
            'xp.between' => 'O XP deve estar entre 1 e 100.',
        ];
    }
}