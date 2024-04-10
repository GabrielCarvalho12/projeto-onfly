<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DespesasRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'usuario' => 'required|exists:users,id',
            'data'=> 'required|before:tomorrow',
            'valor' => 'required|numeric|min:0',
            'descricao' => 'required|string|max:191',
        ];
    }
}
