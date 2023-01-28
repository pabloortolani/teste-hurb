<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyCreateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string',
            'symbol' => 'required|string|unique:currencies,symbol',
            'value' => 'numeric|between:0,1.0'
        ];
    }

    public function messages()
    {
        return [
            'name.required' => 'Obrigatório informar o nome da moeda.',
            'name.string' => 'Nome da moeda inválido.',
            'symbol.required' => 'Obrigatório informar o símbolo da moeda.',
            'symbol.string' => 'Símbolo da moeda inválido.',
            'symbol.unique' => 'Símbolo da moeda já cadastrado.',
            'value.numeric' => 'Valor informado para a cotação da moeda inválido.',
            'value.between' => 'Valor informado inválido. Valores válidos (0 a 1.0)'
        ];
    }
}
