<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateLenderRequest extends FormRequest
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
        return [
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            
            'payoff_address' => 'nullable|string|max:255',

            'payoff_delivery_method' => 'required|integer|exists:lender_payoff_delivery_methods,id',

            'funding_requirements' => 'nullable|array',
            'funding_requirements.*' => 'integer|exists:lender_funding_requirements,id',

            'payoff_requirements' => 'nullable|array',
            'payoff_requirements.*' => 'integer|exists:lender_payoff_requirements,id',

            

        ];
    }
}
