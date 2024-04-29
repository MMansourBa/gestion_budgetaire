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
            'beneficiaire'=>'required|string',
            'montant'=>'required|integer',
            'date'=>'required|date',
            'numero_mandat'=>'required|unique:mandats,numero_mandat',
            'objet'=>'required|string',
        ];
    }

    public function messages()
    {
        return [
            'beneficiaire.required'=>'Le nom est requis',
            'objet.required'=>'Champ requis',
            'montant.required'=>'Champ obligatoire',
            'date.required'=>'Champ obligatoire',
            'numero_mandat.required'=>'Champ obligatoire',
            'numero_mandat.unique'=>'Ce numero existe deja',
        ];
    }
}
