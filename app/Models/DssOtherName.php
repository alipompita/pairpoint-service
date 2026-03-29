<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DssOtherName extends Model
{
    use HasFactory;
    protected $fillable = [
        'ident',
        'name',
    ];

    protected $primaryKey = 'id';
    public function candidate()
    {
        return $this->belongsTo(DssCandidate::class, 'ident', 'ident');
    }
}
