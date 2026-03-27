<?php

use App\Http\Controllers\Auth\SpaAuthController;
use App\Http\Controllers\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', [SpaAuthController::class, 'login'])->middleware(['web','guest']);
Route::post('/logout', [SpaAuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/rooms/available', [RoomController::class, 'queryAvailable'])->name('rooms.available');

