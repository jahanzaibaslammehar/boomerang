<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CustomerRebate extends Model
{
    protected $table = 'customer_rebate';

    protected $fillable = [
        'customer_id',
        'rebate_description',
        'rebate_amount_1',
        'rebate_amount_2',
    ];
}
