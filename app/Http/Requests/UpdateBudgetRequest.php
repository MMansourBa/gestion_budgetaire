<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBudgetRequest extends FormRequest
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
            'numero_compte'=>'required|integer',
            'credits_alloues'=>'required|integer',
        ];
    }

    public function messages()
    {
        return [
            'numero_compte.required' => 'Le numero de compte est requis obligatoire',
            'credits_alloues.required'=>'Ce champ est obligatoire',
        ];
    }
}
