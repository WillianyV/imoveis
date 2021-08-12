<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCityRequest extends FormRequest
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
        // tabela, o campo que tem q ser unico, parametro dizendo que tem que ignorar
        //se o user que está cendo editado é ele mesmo.!
        // ex. cpf, se for editar não tem mais problema, pois sabe agora q aquele usuario
        //possui este cpf
        // unique:cities,name,$this->id
        //mas não da certo
        return [
            'name' => "bail|required|min:3|max:100",
        ];
    }
    // /**
    //  * Get the error messages for the defined validation rules.
    //  *
    //  * @return array
    //  */
    // public function messages()
    // {
    //     return [
    //         'name.required' => 'O nome da cidade é obrigatório',
    //         'name.min' => 'Insira ao menos 3 caracteres para o nome da cidade',
    //         'name.max' => 'Nome muito grande por favor insira menos do que 100 caracteres',
    //         'name.unique' => 'Já existe uma cidade cadastrada com esse nome',
    //     ];
    // }
}