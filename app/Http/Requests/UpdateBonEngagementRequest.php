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
            // 'numero'=>'required|unique:bon_engagements,numero',
            'designation'=>'required|string',
            'prix_unitaire'=>'required|integer',
            'qte'=>'required|integer',
        ];
    }
    public function messages()
    {
        return [
            'numero.required' => 'Le numero est obligatoire',
            // 'numero.unique' => 'Existe deja',
            'designation.required' => 'Champ requis',
            'prix_unitaire.required' => 'Le prix est requis',
            'qte.required' => 'La qte est requis'
        ];
    }
}

