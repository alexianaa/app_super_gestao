<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContatoRequest extends FormRequest
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
                'name' => 'required | min:3 | max:50', // unique:site_contatos
                'motivo_contato_id' => 'required',
                'telefone' => 'required',
                'mensagem' => 'required | max:2000',
                'email' => 'email',
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
                'email.email' => 'O email informado não é valido',
                'required' => 'O campo :attribute deve ser preenchido',
                'min' => 'O campo :attribute deve ter no mínimo :min caracteres',
                'max' => 'O campo :attribute deve ter no mínimo :max caracteres'
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
            'motivo_contato_id' => 'motivo contato',
            'name' => 'nome'
        ];
    }
}
