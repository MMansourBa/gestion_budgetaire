<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveCompteRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'depense_id'=>'required|integer',
            'classe'=>'required|integer',
            'cp'=>'required|integer',
            'cd'=>'required|integer',
            'numero_compte'=>'required|unique:comptes,numero_compte',
            'intitules'=>'required|string',
        ];
    }

    public function messages()
    {
        return [
            'depense_id.required'=>'La categorie de depense est requis',
            'numero_compte.required'=>'Le numero de compte est obligatoire',
            'classe.required'=>'La classe est obligatoire',
            'cp.required'=>'Le numero du compte principal est obligatoire',
            'cd.required'=>'Le numero du compte divisionnaire est obligatoire',
            'intitules.required'=>'Champ obligatoire',
        ];
    }
}
