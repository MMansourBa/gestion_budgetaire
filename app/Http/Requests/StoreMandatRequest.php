<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMandatRequest extends FormRequest
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
            'nom'=>'required|string',
            'somme'=>'required|integer',
            'annee'=>'required|integer',
            'date'=>'required|date',
            'numero_mandat'=>'required|unique:mandats,numero_mandat',
            'numero_be'=>'required|integer',
            'classe'=>'required|integer',
            'cp'=>'required|integer',
            'cd'=>'required|integer',
            'compte'=>'required|integer',
            'objet'=>'required|string'
        ];
    }

    public function messages()
    {
        return [
            'nom.required'=>'Le nom est requis',
            'somme.required'=>'Champ obligatoire',
            'annee.required'=>'Champ obligatoire',
            'date.required'=>'Champ obligatoire',
            'numero_mandat.required'=>'Champ obligatoire',
            'numero_mandat.unique'=>'Ce numero existe deja',
            'numero_be.required'=>'Champ obligatoire',
            'classe.required'=>'Champ obligatoire',
            'cp.required'=>'Champ obligatoire',
            'cd.required'=>'Champ obligatoire',
            'compte.required'=>'Champ obligatoire',
            'objet.required'=>'Champ obligatoire',
        ];
    }
}
