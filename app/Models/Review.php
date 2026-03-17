<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'scheduled_pair_id',
        'reviewer_id',
        'decision',
        'reviewed_at',
        'notes',
    ];

    public function scheduledPair()
    {
        return $this->belongsTo(ScheduledPair::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }
}
