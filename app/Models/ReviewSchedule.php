<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ReviewSchedule extends Model
{
    protected $fillable = [
        'linkage_run_id',
        'batch_size',
    ];

    public function linkageRun()
    {
        return $this->belongsTo(LinkageRun::class);
    }
}
