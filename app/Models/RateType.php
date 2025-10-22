<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RateType extends Model
{
    protected $table = 'rate_type';

    protected $fillable = ['name', 'is_active'];
}
