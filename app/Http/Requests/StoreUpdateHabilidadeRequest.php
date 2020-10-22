<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreUpdateHabilidadeRequest extends FormRequest
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
        $id = $this->segment(2);//recuperando o id pela url, o segmento 2

        return [
            'nome' => 'required|'.Rule::unique('habilidades')->ignore($id).'',
            'foto' => 'nullable|image'
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Nome é obrigatório',
            'name.min' => 'Nome precisa de 3 caracteres mínimos'
           
        ];
    }
}
