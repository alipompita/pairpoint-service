<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DssCandidate extends Model
{
    use HasFactory;
    protected $fillable = [
        'ident',
        'first_name',
        'last_name',
        'sex',
        'dob',
        'site',
    ];

    protected $primaryKey = 'ident';
    public $incrementing = false;

    protected static function boot()
    {
        // if other_names is provided, split it by space and store each as a separete record with DssOtherName model
        static::created(function ($dssCandidate) {});

        // 
        return parent::boot();
    }

    public function otherNames()
    {
        return $this->hasMany(DssOtherName::class, 'ident', 'ident');
    }
}
