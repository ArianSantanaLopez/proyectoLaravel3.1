<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\V1\PartidoController;
use App\Http\Controllers\Api\AuthController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');
Route::prefix('v1')->middleware('auth:sanctum')->group(function () {

Route::apiResource('partidos', PartidoController::class);

});
Route::post('/login',[AuthController::class,'login']);