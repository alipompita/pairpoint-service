<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ScheduledPair extends Model
{
    protected $fillable = [
        'review_schedule_id',
        'matched_pair_id',
        'reviews_count',
    ];

    public function reviewSchedule()
    {
        return $this->belongsTo(ReviewSchedule::class);
    }

    public function matchedPair()
    {
        return $this->belongsTo(MatchedPair::class);
    }
}
