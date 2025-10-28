<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateLocationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {

        // {
        //     "group_location_id": 1,
        //     "name": "Boston",
        //     "phone": "+923120789333",
        //     "email": "jazzymehar@gmail.com",
        //     "fax": "923120789333",
        //     "contact_person_id": 1,
        //     "integrations": {
        //         "cdk": true
        //     }
        // }

        //validation rules

        return [
            'group_location_id' => 'required|integer|exists:group_location,id',
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'email' => 'required|email|max:255',
            'fax' => 'nullable|string|max:50',
            'contact_person_id' => 'required|integer',
            'integrations' => 'required|array',
        ];
    }
}
