<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Request;

class CurrencyUpdateRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules(Request $request)
    {
        return [
            'value' => 'required|numeric|between:0,1.0'
        ];
    }

    public function messages()
    {
        return [
            'value.required' => 'Informe o valor de cotação da moeda.',
            'value.numeric' => 'Valor informado para a cotação da moeda inválido.',
            'value.between' => 'Valor informado inválido. Valores válidos (0 a 1.0)'
        ];
    }
}
