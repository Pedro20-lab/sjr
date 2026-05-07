<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\SpaAuthController;
use Illuminate\Http\Request;

use App\Http\Controllers\ControladorHuesped;
use App\Http\Controllers\ControladorHabitacion;
use App\Http\Controllers\ControladorPrueba;
use App\Http\Controllers\ControladorHospedaje;
use App\Http\Controllers\RoomController;
use App\Models\DetalleHospedaje;
use App\Models\Habitacion;
use App\Models\Hospedaje;
use App\Models\Huesped;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;

Route::get('test', [ControladorPrueba::class, 'testFunction']);

Route::middleware('auth')->group(function() {
    Route::get('/logout', [LoginController::class, 'logout']);

    Route::get('/user', function () {
        return Auth::user();
    });

    Route::get('/rooms/available',[RoomController::class, 'queryAvailable'])->name('rooms.available');

    Route::get('/room/booking', function (Request $request) {
        //[ControladorHospedaje::class, 'store']
        //Display forms for collecting the guests info
        $room = Habitacion::where('id_habitacion', $request->input('id_habitacion'))->firstOrFail();
        return $room;
    })->name('room.booking');

    Route::post('booking/make', function(Request $request) {

        $guests = $request->input('guests');

        $cantidadNinos = Hospedaje::getAmountKids($guests);
        $cantidadAdultos = Hospedaje::getAmountAdults($guests);
        $ingreso = Carbon::parse($request['check_in']);
        $salida = Carbon::parse($request['check_out']);

        $result = DB::transaction(function () use ($cantidadAdultos, $cantidadNinos, $guests, $ingreso, $request, $salida) {

            $hospedaje = Hospedaje::create([
                'empleado_id' => Auth::user()->id_empleado,
                'habitacion_id' => $request['habitacion_id'],
                'ingreso_hospedaje' => $ingreso,
                'salida_hospedaje' => $salida,
                'noches_hospedaje' => $ingreso->diffInDays($salida),
                'cantidad_adultos' => $cantidadAdultos,
                'cantidad_ninos' => $cantidadNinos,
                'estado_hospedaje' => 'Sin confirmar',
            ]);

            $detalles = [];

            
            //var_dump($guests);
            foreach ($guests as $guestPayload) {
                $huesped = Huesped::firstOrCreate(
                    ['num_doc_huesped' => $guestPayload['num_doc_huesped']],

                        [                                                
                        'tipo_doc_huesped' => $guestPayload['tipo_doc_huesped'],
                        'nombre_huesped' => $guestPayload['nombre_huesped'],
                        'apellido_huesped' => $guestPayload['apellido_huesped'],
                        'nacionalidad_huesped' => $guestPayload['nacionalidad_huesped'],
                        'telefono_huesped' => $guestPayload['telefono_huesped'],
                        'fecha_nacimiento_huesped' => $guestPayload['fecha_nacimiento_huesped'] ?? null,
                        ]
                );

                $detalles[] = DetalleHospedaje::create([
                    'hospedaje_id' => $hospedaje->id_hospedaje,
                    'huesped_id' => $huesped->id_huesped,
                ]);
            }

            return [
                'hospedaje' => $hospedaje,
                'detalles' => $detalles,
            ];
        });

        return response()->json($result, 201);
    });

    Route::get('/bookings', function(Request $request) {
        $hospedajes = Hospedaje::all();
        return $hospedajes[0];
    })->name('hospedajes.listar');

});

Route::post('/login', [LoginController::class, 'authenticate'])->name('login')->middleware('guest');


Route::get('huesped/crear', [ControladorHuesped::class, 'crear'])->name('huesped.crear');
Route::post('huesped/guardar', [ControladorHuesped::class, 'guardar'])->name('huesped.guardar');
//Route::get('huesped/{cedula}', [ControladorHuesped::class, 'mostrar'])->name('huesped.mostrar');
Route::get('huespedes', [ControladorHuesped::class, 'mostrar_todos'])->name('huesped.todos');


Route::get('hospedajes/crear', [ControladorHospedaje::class, 'crear_hospedaje'])->name('hospedajes.crear');

Route::get('detalle_hospedaje/crear', [App\Http\Controllers\ControladorDetalleHospedaje::class, 'crear_detalle_hospedaje'])->name('detalle_hospedaje.crear');
Route::post('detalle_hospedaje/guardar', [App\Http\Controllers\ControladorDetalleHospedaje::class, 'guardar_detalle_hospedaje'])->name('detalle_hospedaje.guardar');

Route::get('habitacion/buscar', [ControladorHabitacion::class, 'buscarHabitaciones'])->name('habitacion.buscar');
Route::post('habitacion/consultar', [ControladorHabitacion::class, 'consultarDisponibilidad'])->name('habitaciones.consultar');


Route::get('/token', function (Request $request) {
    $token = $request->session()->token();
 
    return $token;
});

Route::get('/prueba', function () {
    return view('testview');
});



                                                                   
                        