<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LenderFundingRequirement extends Model
{
    protected $table = 'lender_funding_requirements';
    protected $fillable = [
        'requirement_name',
        'is_active',
    ];
    //
}
