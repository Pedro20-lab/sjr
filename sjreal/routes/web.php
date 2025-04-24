<?php

use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\GuestController;
use App\Http\Controllers\LodgementController;
use App\Http\Controllers\ParkingController;
use App\Http\Controllers\StockController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
//    return view('layouts.app');
    return view('welcome');
})->name('home');

Route::resource('guest', GuestController::class);
Route::resource('employee', EmployeeController::class);
Route::resource('parking', ParkingController::class);
Route::resource('stock', StockController::class);
Route::resource('lodgement', LodgementController::class);

