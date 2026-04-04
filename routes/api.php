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

Route::get('/health', function () {
    return response()->json(['status' => 'ok']);
});

Route::post('/login', [App\Http\Controllers\Api\AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });
    Route::post('/user/update_password', [App\Http\Controllers\Api\AuthController::class, 'update_password']);

    Route::post('/logout', [App\Http\Controllers\Api\AuthController::class, 'logout']);

    // admin routes
    Route::middleware('admin')->group(function () {
        Route::apiResource('/users', App\Http\Controllers\Api\UserController::class);
        Route::put('/users/{id}/password', [App\Http\Controllers\Api\UserController::class, 'reset_password']);
    });
});
