<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Contracts\Validation\Validator;

class CreditoRequest extends FormRequest
{
    protected $stopOnFirstFailure = true;

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    public function messages()
    {
        return [
            'valor_emprestimo.required' => 'O valor do empréstimo é obrigatório',
            'valor_emprestimo.regex' => 'O formato do valor do empréstimo é inválido',
            'instituicoes.array' => 'O formato do campo instituições é inválido',
            'convenios.array' => 'O formato do campo convenios é inválido',
            'parcela.numeric' => 'O formato do campo parcela é inválido'
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'valor_emprestimo' => 'required|regex:/[-+]?[0-9]*\.[0-9]*/',
            'instituicoes' => 'nullable|array',
            'convenios' => 'nullable|array',
            'parcela' => 'nullable|numeric'
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response([
            'errors' => $validator->errors()->messages()
        ]));
    }
}
