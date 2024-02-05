<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::prefix('v1')->group(function (){

    Route::post('login',[\App\Http\Controllers\v1\AuthController::class,'login']);


    Route::middleware('auth:sanctum')->group(function (){

        // Authentications actions
        Route::get('/profile',[\App\Http\Controllers\v1\AuthController::class,'profile']);
        Route::post('/logout',[\App\Http\Controllers\v1\AuthController::class,'logout']);

        // CRUD TEST
        Route::get("/tests",[\App\Http\Controllers\v1\TestController::class,"index"]);
        Route::post("/tests",[\App\Http\Controllers\v1\TestController::class,"store"]);
        Route::get("/tests/{testUuid}",[\App\Http\Controllers\v1\TestController::class,"show"]);
        Route::post("/tests/{testUuid}",[\App\Http\Controllers\v1\TestController::class,"update"]);
        Route::delete("/tests/{testUuid}",[\App\Http\Controllers\v1\TestController::class,"destroy"]);

    });
});
