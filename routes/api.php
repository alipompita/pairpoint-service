<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['check.api'])->group(function () {
    Route::apiResource('dss-candidates', App\Http\Controllers\Api\DssCandidateController::class);
    Route::apiResource('facility-entities', App\Http\Controllers\Api\FacilityEntityController::class);
    Route::apiResource('organisation-units', App\Http\Controllers\Api\OrganisationUnitController::class);
    // Route::apiResource('matched-pairs', App\Http\Controllers\Api\MatchedPairController::class);
    // Route::apiResource('review-schedules', App\Http\Controllers\Api\ReviewScheduleController::class);
});
