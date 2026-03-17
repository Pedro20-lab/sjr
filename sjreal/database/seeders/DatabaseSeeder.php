<?php

namespace Database\Seeders;

use App\Models\Cliente;
use App\Models\DetalleHospedaje;
use App\Models\DetallePago;
use App\Models\Empleado;
use App\Models\Habitacion;
use App\Models\Hospedaje;
use App\Models\Huesped;
use App\Models\Pago;
use Database\Factories\PagoFactory;
use Illuminate\Database\Eloquent\Factories\Sequence;
use Illuminate\Database\Eloquent\Relations\HasMany;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {   
        Empleado::factory(5)->create();

        //Huespedes mayores de edad y menores de edad
        Huesped::factory(30)->mayores()->create();        
        Huesped::factory(10)->menores()->create();

        //Clientes empresariales y personas
        Cliente::factory(10)->empresas()->create();
        Cliente::factory(10)->personas()->create();
        
        //Habs sencillas
        Habitacion::factory(9)->sencillas()
            ->state(new Sequence(                
                ['numero_habitacion' => '202'],
                ['numero_habitacion' => '205'],
                ['numero_habitacion' => '207'], 
                ['numero_habitacion' => '302'], 
                ['numero_habitacion' => '305'],                 
                ['numero_habitacion' => '307'],
                ['numero_habitacion' => '402'],
                ['numero_habitacion' => '404'],
                ['numero_habitacion' => '405']
            ))
            ->create();
        //Habs para parejas
        Habitacion::factory(9)->dobles()
            ->state(new Sequence(
                 ['numero_habitacion' => '201'],
                 ['numero_habitacion' => '203'],
                 ['numero_habitacion' => '204'],
                 ['numero_habitacion' => '301'],
                 ['numero_habitacion' => '303'],
                 ['numero_habitacion' => '304'],
                 ['numero_habitacion' => '401'],
                 ['numero_habitacion' => '403'],
                 ['numero_habitacion' => '407'],
                 ['numero_habitacion' => '101'],
                 ['numero_habitacion' => '102'],
             ))
             ->create();
         //Habs para familias
        Habitacion::factory(3)->familiares()
            ->state(new Sequence(
                 ['numero_habitacion' => '206'],
                 ['numero_habitacion' => '306'],
                 ['numero_habitacion' => '406']
            ))
            ->create();

        Hospedaje::factory(5)->parejas()->create();
        Hospedaje::factory(5)->sencillas()->create();
        Hospedaje::factory(5)->familiares()->create();

        DetalleHospedaje::factory(10)->para_adultos()
            ->state(new Sequence(
                ['hospedaje_id' => 1],
                ['hospedaje_id' => 2],
                ['hospedaje_id' => 3], 
                ['hospedaje_id' => 4],
                ['hospedaje_id' => 5],
            ))->create();
        
        DetalleHospedaje::factory(5)->para_adultos()
            ->state(new Sequence(
                ['hospedaje_id' => 6],
                ['hospedaje_id' => 7],
                ['hospedaje_id' => 8], 
                ['hospedaje_id' => 9],
                ['hospedaje_id' => 10],
            ))->create();

        DetalleHospedaje::factory(10)->para_adultos()
            ->state(new Sequence(
                ['hospedaje_id' => 11],
                ['hospedaje_id' => 12],
                ['hospedaje_id' => 13], 
                ['hospedaje_id' => 14],
                ['hospedaje_id' => 15],
            ))->create();

        DetalleHospedaje::factory(10)->para_ninos()
            ->state(new Sequence(
                ['hospedaje_id' => 11],
                ['hospedaje_id' => 12],
                ['hospedaje_id' => 13], 
                ['hospedaje_id' => 14],
                ['hospedaje_id' => 15],
            ))->create();
        
        Pago::factory(15)->create();
        
        DetallePago::factory(15)->state(new Sequence(
            ['pago_id' => 1, 'hospedaje_id' => 1],
            ['pago_id' => 2, 'hospedaje_id' => 2],
            ['pago_id' => 3, 'hospedaje_id' => 3],
            ['pago_id' => 4, 'hospedaje_id' => 4],
            ['pago_id' => 5, 'hospedaje_id' => 5],
            ['pago_id' => 6, 'hospedaje_id' => 6],
            ['pago_id' => 7, 'hospedaje_id' => 7],
            ['pago_id' => 8, 'hospedaje_id' => 8],
            ['pago_id' => 9, 'hospedaje_id' => 9],
            ['pago_id' => 10, 'hospedaje_id' => 10],
            ['pago_id' => 11, 'hospedaje_id' => 11],
            ['pago_id' => 12, 'hospedaje_id' => 12],
            ['pago_id' => 13, 'hospedaje_id' => 13],
            ['pago_id' => 14, 'hospedaje_id' => 14],
            ['pago_id' => 15, 'hospedaje_id' => 15],
        ))->create();

    }
}
