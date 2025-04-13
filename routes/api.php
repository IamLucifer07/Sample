<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\DataController;


Route::get('/datas', [DataController::class, 'index']);
Route::get('/datas/{id}', [DataController::class, 'show']);
Route::post('/datas', [DataController::class, 'store']);
Route::put('/datas/{id}', [DataController::class, 'update']);
Route::delete('/datas/{id}', [DataController::class, 'destroy']);
