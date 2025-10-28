<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $table = 'locations';

    protected $fillable = [
        'group_location_id',
        'name',
        'phone',
        'email',
        'fax',
        'contact_person_id',
        'integrations',
        'is_notification_enabled',
        'is_active',
    ];
    
    protected $casts = [
        'integrations' => 'array',
    ];
}
