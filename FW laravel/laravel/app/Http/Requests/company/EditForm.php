<?php

namespace App\Http\Requests\company;

use Illuminate\Foundation\Http\FormRequest;

class EditForm extends FormRequest
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
            'id' => 'required|exists:App\Models\Company,id',
            'name' => 'required|string',
            'email' => 'required|string',
            'website' => 'required|string',
            'logo' => 'dimensions:min_width=100,min_height=100|mimes:png|max:2000'
        ];
    }

    public function messages()
    {
        return [
           'id.required' => 'A :attribute is required',
           'id.exists' => 'Data not found',
           'name.required' => 'A :attribute is required',
           'name.string' => 'A :attribute must be string',

           'email.required' => 'A :attribute is required',
           'email.string' => 'A :attribute must be string',

           'website.required' => 'A :attribute is required',
           'website.string' => 'A :attribute must be string',
           
           'logo.dimensions' => 'A :attribute min 100',
           'logo.*.size.max' => 'A :attribute is max 2 mb',
           'logo.*.mimeType.mimes' => 'A :attribute must PNG',
        ];
    }
}
