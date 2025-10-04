<?php

use App\Http\Controllers\EsportDataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');




// route api
Route::prefix('v1')->middleware('api')->group(function () {
 
    Route::post('/upload-data', [EsportDataController::class, 'upload']);
  
});