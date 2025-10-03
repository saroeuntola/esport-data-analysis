<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');



Route::prefix('v1')->middleware('api')->group(function () {
  //test route 
    Route::get('/ping', function () {
        return response()->json([
            'pong' => true
        ]);
    });

  
    // Route::get('/posts', [PostController::class, 'index']);    
    // Route::get('/posts/{id}', [PostController::class, 'show']);   
    // Route::post('/posts', [PostController::class, 'store']);     
    // Route::put('/posts/{id}', [PostController::class, 'update']); 
    // Route::delete('/posts/{id}', [PostController::class, 'destroy']);
});