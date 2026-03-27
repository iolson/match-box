<?php

use App\Http\Controllers\Api\V1\EventApiController;
use App\Http\Controllers\Api\V1\LogReceiverController;
use App\Http\Controllers\Api\V1\MatchApiController;
use App\Http\Controllers\Api\V1\ScreenApiController;
use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/matches', [MatchApiController::class, 'index']);
    Route::get('/matches/{match:uuid}', [MatchApiController::class, 'show']);

    Route::get('/events', [EventApiController::class, 'index']);
    Route::get('/events/{event}', [EventApiController::class, 'show']);

    Route::get('/screen/{event}', [ScreenApiController::class, 'show']);

    Route::middleware('auth:sanctum')->group(function () {
        Route::post('/log-receiver', [LogReceiverController::class, 'store']);
    });
});
