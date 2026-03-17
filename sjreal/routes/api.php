<?php

use App\Http\Controllers\ControladorHabitacion;
use App\Http\Controllers\RoomController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('/rooms/available', [RoomController::class, 'queryAvailable'])->name('rooms.available');

