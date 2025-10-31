<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerTrade extends Model
{
    protected $table = 'customer_trade';

    protected $fillable = [
        'customer_id',
        'trade_vin',
        'scc_account_number',
        'payoff_amount',
        'per_diem',
        'date_20_days_payoff',
        'trade_lender_id',
    ];
}
