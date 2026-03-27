<?php

use App\Http\Controllers\Auth\SpaAuthController;
use Illuminate\Http\Request;

use App\Http\Controllers\ControladorHuesped;
use App\Http\Controllers\ControladorHabitacion;
use App\Http\Controllers\ControladorPrueba;
use App\Http\Controllers\ControladorHospedaje;
use Illuminate\Support\Facades\Route;

Route::post('/login', [SpaAuthController::class, 'login'])->middleware('guest');
Route::post('/logout', [SpaAuthController::class, 'logout'])->middleware('auth:sanctum');

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::get('test', [ControladorPrueba::class, 'testFunction']);

Route::get('/', function () {
    return 'In the works, check out later!';
})->name('home');

Route::get('huesped/crear', [ControladorHuesped::class, 'crear'])->name('huesped.crear');
Route::post('huesped/guardar', [ControladorHuesped::class, 'guardar'])->name('huesped.guardar');
Route::get('huesped/{cedula}', [ControladorHuesped::class, 'mostrar'])->name('huesped.mostrar');
Route::get('huespedes', [ControladorHuesped::class, 'mostrar_todos'])->name('huesped.todos');

Route::get('hospedajes', [ControladorHospedaje::class, 'listar_hospedajes'])->name('hospedajes.listar');
Route::get('hospedajes/crear', [ControladorHospedaje::class, 'crear_hospedaje'])->name('hospedajes.crear');

Route::get('detalle_hospedaje/crear', [App\Http\Controllers\ControladorDetalleHospedaje::class, 'crear_detalle_hospedaje'])->name('detalle_hospedaje.crear');
Route::post('detalle_hospedaje/guardar', [App\Http\Controllers\ControladorDetalleHospedaje::class, 'guardar_detalle_hospedaje'])->name('detalle_hospedaje.guardar');

Route::get('habitacion/buscar', [ControladorHabitacion::class, 'buscarHabitaciones'])->name('habitacion.buscar');
Route::post('habitacion/consultar', [ControladorHabitacion::class, 'consultarDisponibilidad'])->name('habitaciones.consultar');


//Route::get('/token', function () {
//        return csrf_token();
//});

Route::get('/prueba', function () {
    return view('testview');
});
