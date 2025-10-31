<?php

namespace App\Http\Requests\admin;

use Illuminate\Foundation\Http\FormRequest;

class CreateCustomerRequest extends FormRequest
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
            'email' => 'required|string|email|max:255',
            'phone' => 'required|string|max:20',
            'vehicle' => 'nullable|string|max:255',
            'total_finance_amount' => 'required|numeric',
            'finance_manager' => 'required|integer',
            'sales_manager' => 'required|integer',
            'sales_person_1' => 'required|integer',
            'sales_person_2' => 'required|integer',
            'tax_credit' => 'required|boolean',
            'vehicle_type_id' => 'required|integer',
            'vin' => 'required|string|max:50',
            'miles' => 'required|string|max:20',
            'is_rebate' => 'required|boolean',

            //when rebate is coming
            'rebate_items' => 'required_with:is_rebate|array',
            'rebate_items.*.rebate_description' => 'sometimes|nullable|required',
            'rebate_items.*.rebate_amount_1' => 'sometimes|required|numeric',
            'rebate_items.*.rebate_amount_2' => 'sometimes|required|numeric',


            'is_trade' => 'required|boolean',

            //when trade is coming
            'trade_items' => 'required_with:is_trade|array',
            'trade_items.*.trade_vin' => 'sometimes|nullable|required|string|max:50',
            'trade_items.*.scc_account_number' => 'sometimes|nullable|required|string|max:20',
            'trade_items.*.payoff_amount' => 'sometimes|nullable|required|numeric',
            'trade_items.*.per_diem' => 'sometimes|nullable|required|numeric',
            'trade_items.*.date_20_days_payoff' => 'sometimes|nullable|required|date',
            'trade_items.*.trade_lender_id' => 'sometimes|nullable|required|integer',


            'scc_account_number' => 'nullable|string|max:100',
            'payoff_amount' => 'nullable|numeric',
            'per_diem' => 'nullable|numeric',
            'date_20_days_payoff' => 'nullable|date',
            'trade_lender' => 'nullable|integer',
            'finance_lender' => 'required|integer',
            'rate_type_id' => 'required|integer',
            'buy_rate' => 'required|numeric',
            'sell_rate' => 'required|numeric',
            'is_flat_fee' => 'required|boolean',
            'is_percentage_of_amount_financed' => 'required|boolean',
            'package' => 'required|numeric',
            'bank_fee' => 'required|numeric',
            'is_special_finance_deal' => 'required|boolean',
            'special_deal_proof_document' => 'nullable|string|max:255',
            'down_payment' => 'required|numeric',
        ];
    }
}
