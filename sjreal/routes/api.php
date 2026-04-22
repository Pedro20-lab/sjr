<?php

use App\Http\Controllers\Auth\SpaAuthController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\ControladorHuesped;
use App\Models\Huesped;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use function Symfony\Component\String\s;

Route::post('/login', [SpaAuthController::class, 'login'])->name('login')->middleware(['web','guest']);
Route::post('/logout', [SpaAuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/user', function () {
    return Auth::user();
})->middleware('auth:sanctum');

Route::get('/huesped/find', [ControladorHuesped::class, 'mostrar'])->name('huesped.mostrar')->middleware('auth:sanctum');

Route::get('/rooms/available', [RoomController::class, 'queryAvailable'])->name('rooms.available');

