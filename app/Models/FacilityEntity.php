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
        'phone_number',
        'place_of_residence__physical_address',
    ];

    protected $primaryKey = 'tracked_entity_instance';
    public $incrementing = false;
}
