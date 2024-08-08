<?php

use App\Http\Controllers\Api\EspecieController;
use App\Models\Especie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/especie', function(Request $request){
    return Especie::all();
});


Route::get('/especie', [EspecieController::class, 'index']);
Route::get('/especie/{id}', [EspecieController::class, 'show']);
Route::post('/especie', [EspecieController::class, 'store']);
Route::put('/especie/{id}', [EspecieController::class, 'update']);
Route::delete('/especie/{id}', [EspecieController::class, 'destroy']);



