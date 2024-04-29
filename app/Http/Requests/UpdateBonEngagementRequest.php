<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBonEngagementRequest extends FormRequest
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
            'numero_bon'=>'required|string',
            'numero_compte'=>'required|integer',
            'intitules'=>'required|string',
            'beneficiaire'=>'required|string',
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
            'beneficiaire.required'=>'Champ obligatoire',
            'numero_compte'=>'Le numero de compte est requis',
            'credits_alloues.required'=>'Champ obligatoire',
            'depense_id.required'=>'Champ obligatoire',
            'classe.required'=>'La classe est obligatoire',
            'cp.required'=>'Ce champ est obligatoire',
            'cd.required'=>'Ce champ est obligatoire',
            'date.required'=>'La date est requise',
            'intitules.required'=>'Champ requis',
        ];
    }
}

