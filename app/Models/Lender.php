<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Lender extends Model
{
    protected $table = 'lenders';
    protected $fillable = [
        'name',
        'phone',
        'address',
        'payoff_address',
        'payoff_delivery_method',
        'location_id',
    ];
    //
}
