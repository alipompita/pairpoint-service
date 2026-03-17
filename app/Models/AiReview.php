<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AiReview extends Model
{

    protected $fillable = [
        'matched_pair_id',
        'model_version',
        'decision',
        'confidence_score',
        'reviewed_at',
    ];

    protected $casts = [
        'reviewed_at' => 'datetime',
    ];

    public function matchedPair()
    {
        return $this->belongsTo(MatchedPair::class);
    }
}
