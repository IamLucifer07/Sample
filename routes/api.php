<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DataController;


Route::namespace('Api')->group(function () {
    Route::get('/datas', [DataController::class, 'index']);
    Route::post('/datas', [DataController::class, 'store']);
    Route::get('/datas/{id}', [DataController::class, 'show']);
    Route::put('/datas/{id}', [DataController::class, 'update']);
    Route::delete('/datas/{id}', [DataController::class, 'destroy']);
});
