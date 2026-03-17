<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MatchedPair extends Model
{

    protected $fillable = [
        'tracked_entity_instance',
        'ident',
        'similarity_score',
        'linkage_run_id',
        'match_status',
    ];

    public function facilityEntity()
    {
        return $this->belongsTo(FacilityEntity::class, 'tracked_entity_instance', 'tracked_entity_instance');
    }

    public function dssCandidate()
    {
        return $this->belongsTo(DssCandidate::class, 'ident', 'ident');
    }

    public function linkageRun()
    {
        return $this->belongsTo(LinkageRun::class);
    }
}
