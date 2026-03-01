<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\V1\EtudiantCoursController;

Route::prefix('v1/auth')->group(function () {

    Route::post('/register', [AuthController::class, 'register']);

    Route::post('/login', [AuthController::class, 'login']);

    Route::middleware('auth:sanctum')->group(function () {

        Route::post('/logout', [AuthController::class, 'logout']);

        Route::get('/me', [AuthController::class, 'me']);

    });

});
Route::prefix('v1')->middleware('auth:sanctum')->group(function () {

    Route::post('/etudiants/{id}/cours/attach', [EtudiantCoursController::class, 'attach']);

    Route::post('/etudiants/{id}/cours/detach', [EtudiantCoursController::class, 'detach']);

    Route::post('/etudiants/{id}/cours/sync', [EtudiantCoursController::class, 'sync']);

});