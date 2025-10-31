<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Customer extends Model
{
    use SoftDeletes;
    
    protected $table = 'customers';
    
    protected $fillable = [
        'name',
        'email',
        'phone',
        'vehicle',
        'total_finance_amount',
        'finance_manager',
        'sales_manager',
        'sales_person_1',
        'sales_person_2',
        'tax_credit',
        'vehicle_type_id',
        'vin',
        'miles',
        'is_rebate',
        'is_trade',
        'finance_lender',
        'is_customer_tradein_vehicle',
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

    public function rebates()
    {
        return $this->hasMany(CustomerRebate::class, 'customer_id');
    }

    public function trades()
    {
        return $this->hasMany(CustomerTrade::class, 'customer_id');
    }
    
}
