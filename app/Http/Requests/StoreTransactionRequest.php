<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTransactionRequest extends FormRequest
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
            'numero_compte'=>'required|unique:transactions,numero_compte',
            'intitule'=>'required|string',
            'credits_alloues'=>'required|integer',
            // 'numero_depense'=>'integer',
            // 'titre_depense'=>'string',
            // 'montant'=>'integer',
            'date'=>'required|date',
        ];
    }

    public function messages()
    {
        return [
            'depense_id.required'=>'La categorie de depense est requis',
            'numero_compte.required'=>'Le numero de compte est obligatoire',
            'numero_compte.unique'=>'Le numero de compte existe deja',
            'intitule.required'=>'Ce champ est obligatoire',
            'credits_alloues.required'=>'L\'allocation du budget est requis',
            'date.required'=>'La date est requis',
        ];
    }
}
