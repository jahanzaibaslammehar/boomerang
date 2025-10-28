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
            'tax_credit' => 'required|boolean',
            'vehicle_type_id' => 'required|integer',
            'vin' => 'required|string|max:50',
            'miles' => 'required|string|max:20',
            'is_rebate' => 'required|boolean',
            'rebate_description' => 'nullable|string',
            'rebate_amount_1' => 'nullable|numeric',
            'rebate_amount_2' => 'nullable|numeric',
            'is_trade' => 'required|boolean',
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
