<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LenderPayoffDeliveryMethods extends Model
{
    protected $table = 'lender_payoff_delivery_methods';

    protected $fillable = [
        'name',
        'is_active',
    ];
}
