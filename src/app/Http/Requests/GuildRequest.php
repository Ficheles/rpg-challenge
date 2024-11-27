<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class GuildRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'number_of_guilds' => 'required|integer|min:1',
        ];
    }

    public function messages()
    {
        return [
            'number_of_guilds.required' => 'A quantidade de jogadores por guilda é obrigatória.',
            'number_of_guilds.integer' => 'A quantidade deve ser um número inteiro.',
            'number_of_guilds.min' => 'Deve haver pelo menos 1 jogador por guilda.',
        ];
    }
}