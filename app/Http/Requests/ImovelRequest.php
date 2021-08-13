<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ImovelRequest extends FormRequest
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
            'title' => 'bail|required|min:3|max:100',
            'ground' => 'bail|required|integer|min:0',
            'living_room' => 'bail|required|integer|min:0',
            'bathroom' => 'bail|required|integer|min:0',
            'room' => 'bail|required|integer|min:0',
            'garage' => 'bail|required|integer|min:0',
            'descrytion' => 'bail|nullable|string',
            'price' => 'bail|required|numeric|min:0',
            'city_id' => 'bail|required|integer',
            'type_id' => 'bail|required|integer',
            'goal_id' => 'bail|required|integer',
            'street' => 'bail|required|min:1|max:100',
            'house_number' => 'bail|required|integer',
            'complement' => 'bail|nullable|string',
            'district' => 'bail|required|min:1|max:255',
            'proximity' => 'bail|nullable|array',
        ];
    }

    /**
     * Customizar o nome dos atributos dos campos, nas mensagens de erros
     */
    public function attributes()
    {
        return [
            'title' => 'título',
            'ground' => 'terreno em m²',
            'living_room' => 'quantidade de salas',
            'bathroom' => 'quantidade de banheiros',
            'room' => 'quantidade de quartos',
            'garage' => 'quantidade de vagas na garagem',
            'descrytion' => 'descrição',
            'price' => 'preço',
            'city_id' => 'cidade',
            'type_id' => 'tipo',
            'goal_id' => 'finalidade',
            'street' => 'rua',
            'house_number' => 'número',
            'complement' => 'complemento',
            'district' => 'bairro',
            'proximity' => 'pontos de referência',
        ];
    }

    /**
     * Customizar as mensagens de erros
     */
    public function messages()
    {
        return [
            // 'required' => 'Por favor insira um valor no campo :attribute',
            'goal_id.required' => 'Por favor selecione uma opção',
        ];
    }
}
