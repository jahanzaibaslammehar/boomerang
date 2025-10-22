<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LenderPayoffRequirement extends Model
{
    protected $table = 'lender_payoff_requirements';

    protected $fillable = [
        'requirement_name',
        'is_active',
    ];

    //
}
