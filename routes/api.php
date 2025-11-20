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
    Route::prefix('teams')->group(function () {
        Route::get('get-all', [TeamController::class, 'index']);
        Route::post('create', [TeamController::class, 'store']);

    });

    Route::prefix('team-members')->group(function () {
        // Members
        Route::get('get-all', [TeamMemberController::class, 'index']);
        Route::post('create', [TeamMemberController::class, 'store']);
    });

    Route::prefix('hero')->group(function () {
        // Heroes
        Route::get('get-all', [HeroController::class, 'index']);
        Route::post('create', [HeroController::class, 'store']);
    });

    Route::prefix('matches-pick')->group(function () {
         // Matches
    Route::get('get-all', [MatchPickController::class, 'index']);
    Route::post('create', [MatchPickController::class, 'store']);

    });

    Route::prefix('team-stats')->group(function () {
         // Team Stats
    Route::get('get-all', [TeamStatsController::class, 'index']);
    Route::post('create', [TeamStatsController::class, 'store']);
    });

    Route::prefix('player-stats')->group(function () {
         // Player Stats
    Route::get('get-all', [PlayerStatsController::class, 'index']);
    Route::post('create', [PlayerStatsController::class, 'store']);
       // Player history by hero
    Route::get('get-player/{id}/hero-stats', [PlayerStatsController::class, 'heroStats']);
    });

   

  

   

   

   

   
});


   