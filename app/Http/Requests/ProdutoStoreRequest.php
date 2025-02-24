<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProdutoStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return
            [
                'nome' => 'required | min:3 | max:100',
                'descricao' => 'required | min:3 | max:2000',
                'peso' => 'required | integer',
                'unidade_id' => 'exists:unidades,id',
            ];
    }

    /**
     * Get the error messages for the defined validation rules.
     *
     * @return array<string, string>
     */
    public function messages(): array
    {
        return
            [
                'required' => 'O campo :attribute deve ser preenchido',
                'min' => 'O campo :attribute deve ter no mínimo :min caracteres',
                'max' => 'O campo :attribute deve ter no mínimo :max caracteres',
                'integer' => 'O campo :attribute deve ser um número inteiro',
                'exists' => 'O campo :attribute deve ser uma unidade de medida existente'
            ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, string>
     */
    public function attributes(): array
    {
        return [
            'unidade_id' => 'unidade',
        ];
    }
}
