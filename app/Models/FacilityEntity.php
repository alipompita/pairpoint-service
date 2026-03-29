<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class FacilityEntity extends Model
{
    protected $fillable = [
        'tracked_entity_instance',
        'organisation_unit',
        'first_name',
        'last_name',
        "age",
        'date_of_birth',
        'phone_number',
        'place_of_residence__physical_address',
        'date_of_registration',
    ];

    protected $casts = [
        'age' => 'integer',
        'date_of_birth' => 'date',
        'date_of_registration' => 'date',
    ];

    protected $primaryKey = 'tracked_entity_instance';
    public $incrementing = false;
}
