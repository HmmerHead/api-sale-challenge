<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreVendaRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules()
    {
        return [
            'vendedor_id' => 'required|exists:vendedor,id',
            'valor' => 'required|numeric|min:0.01',
            'data_da_venda' => 'required|date',
        ];
    }

    public function messages()
    {
        return [
            'vendedor_id.required' => 'O vendedor é obrigatório.',
            'vendedor_id.exists' => 'O vendedor informado não existe.',
            'valor.required' => 'O valor da venda é obrigatório.',
            'valor.numeric' => 'O valor da venda deve ser numérico.',
            'valor.min' => 'O valor da venda deve ser maior que 0.',
            'data_da_venda.required' => 'A data da venda é obrigatória.',
            'data_da_venda.date' => 'A data da venda deve ser uma data válida.',
        ];
    }
}
