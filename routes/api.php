<?php

use App\Http\Controllers\EsportDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\TeamController;
use App\Http\Controllers\Api\TeamMemberController;
use App\Http\Controllers\Api\HeroController;
use App\Http\Controllers\Api\MatchPickController;
use App\Http\Controllers\Api\TeamStatsController;
use App\Http\Controllers\Api\PlayerStatsController;
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// route api
Route::prefix('v1')->middleware('api')->group(function () {

    // Route::post('/upload-data', [EsportDataController::class, 'upload']);
    // Route::get('/esport-data', [EsportDataController::class, 'getAllEsportData']);
    // Route::get('/esport-filter', [EsportDataController::class, 'getFilterData']);


    // Teams
    Route::get('get-teams', [TeamController::class, 'index']);
    Route::post('create-teams', [TeamController::class, 'store']);

    // Members
    Route::get('get-team-members', [TeamMemberController::class, 'index']);
    Route::post('create-team-members', [TeamMemberController::class, 'store']);

    // Heroes
    Route::get('get-heroes', [HeroController::class, 'index']);
    Route::post('create-heroes', [HeroController::class, 'store']);

    // Matches
    Route::get('get-matches-pick', [MatchPickController::class, 'index']);
    Route::post('create-matches-pick', [MatchPickController::class, 'store']);

    // Team Stats
    Route::get('get-team-stats', [TeamStatsController::class, 'index']);
    Route::post('create-team-stats', [TeamStatsController::class, 'store']);

    // Player Stats
    Route::get('get-player-stats', [PlayerStatsController::class, 'index']);
    Route::post('create-player-stats', [PlayerStatsController::class, 'store']);

    // Player history by hero
    Route::get('get-player/{id}/hero-stats', [PlayerStatsController::class, 'heroStats']);
});


   