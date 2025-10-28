<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupLocation extends Model
{
    protected $table = 'group_location';

    protected $fillable = [
        'name',
        'contact_person__name',
        'contact_person__phone',
        'contact_person__email',
        'is_active',
    ];
}
