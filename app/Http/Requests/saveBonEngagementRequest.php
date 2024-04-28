<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class saveBonEngagementRequest extends FormRequest
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
            'numero_bon'=>'required|unique:bons,numero_bon',
            'numero_compte'=>'required|integer',
            'intitules'=>'required|string',
            'beneficiare'=>'required|string',
            'credits_alloues'=>'required|integer',
            'montant'=>'integer',
            'depense_id'=>'required|integer',
            'classe'=>'required|integer',
            'cp'=>'required|integer',
            'cd'=>'required|integer',
            'date'=>'required|date',
        ];
    }
    public function messages()
    {
        return [
            'numero_bon.required' => 'Le numero du bon est obligatoire',
            'numero_bon.unique' => 'Ce numero de bon existe deja',
            'beneficiare.required'=>'Champ obligatoire',
            'numero_compte'=>'Le numero de compte est requis',
            'credits_alloues.required'=>'Champ obligatoire',
            'depense_id.required'=>'Champ obligatoire',
            'classe.required'=>'La classe est obligatoire',
            'cp.required'=>'Ce champ est obligatoire',
            'cd.required'=>'Ce champ est obligatoire',
            'date.required'=>'La date est requise',
            'intitules.required'=>'Champ requis',
            'montant.integer'=>'Le montant doit etre un entier'
        ];
    }
}
