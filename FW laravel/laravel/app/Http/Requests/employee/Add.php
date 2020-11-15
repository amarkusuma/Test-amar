<?php

namespace App\Http\Requests\employee;

use Illuminate\Foundation\Http\FormRequest;

class Add extends FormRequest
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
            'name' => 'required|string',
            'email' => 'required|string',
            'company_id' => 'required|integer|exists:App\Models\Company,id',
        ];
    }

    public function messages()
    {
        return [
           
            'name.required' => 'A :attribute is required',
            'name.string' => 'A :attribute must be string',

            'email.required' => 'A :attribute is required',
            'email.string' => 'A :attribute must be string',
            
            'company_id.required' => 'A :attribute is required',
            'company_id.integer' => 'A :attribute must be integer',
            'company_id.exists' => 'Data Not Found',
        ];
    }
}
