<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ClientRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|min:2',
            'regist' => 'required|numeric',
            'secretary' => 'required|min:3',
            'workplace' => 'required|min:3'
        ];
    }
    public function messages()
    {
        return [
            'name.required' => 'Nome é obrigatório.',
            'regist.required' => 'Matricula é obrigatória.',
            'secretary.required' => 'Secretaria é obrigatória.',
            'workplace.required' => 'Lotação é obrigatória.',
            'regist.numeric' => 'Matricula precisa ser numérico.',
            'name.min' => 'Nome precisa ter pelo menos 2 caracteres.',
            'secretary.min' => 'Secretaria precisa ter pelo menos 3 caracteres.',
            'workplace.min' => 'Lotação precisa ter pelo menos 3 caracteres.',
        ];
    }
}
