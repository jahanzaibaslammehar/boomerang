<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupLocation extends Model
{
    protected $table = 'group_location';

    protected $fillable = [
        'name',
        'contact_person_name',
        'contact_person_phone',
        'contact_person_email',
        'is_active',
    ];
}
