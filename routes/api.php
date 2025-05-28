<?php
use App\Http\Controllers\Api\CarController;
use App\Http\Controllers\Api\OwnerController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('owners', OwnerController::class);

Route::apiResource('cars', CarController::class);

Route::get('owners/{owner}/cars', function ($ownerId){
    $owner = \App\Models\Owner::findOrFail($ownerId);
    return \App\Http\Resources\CarResource::collection($owner->cars);
});
