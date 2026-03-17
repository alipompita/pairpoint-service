<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LinkageRun extends Model
{
    use HasFactory;

    protected $fillable = [
        'started_at',
        'finished_at',
        'status',
        'completed',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'finished_at' => 'datetime',
        'completed' => 'boolean',
    ];
}
