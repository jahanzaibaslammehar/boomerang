<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'vehicle',
        'total_finance_amount',
        'finance_manager',
        'tax_credit',
        'vehicle_type_id',
        'vin',
        'miles',
        'is_rebate',
        'rebate_description',
        'rebate_amount_1',
        'rebate_amount_2',
        'is_trade',
        'scc_account_number',
        'payoff_amount',
        'per_diem',
        'date_20_days_payoff',
        'trade_lender',
        'finance_lender',
        'rate_type_id',
        'buy_rate',
        'sell_rate',
        'is_flat_fee',
        'is_percentage_of_amount_financed',
        'package',
        'bank_fee',
        'is_special_finance_deal',
        'special_deal_proof_document',
        'down_payment',
    ];
    
}
