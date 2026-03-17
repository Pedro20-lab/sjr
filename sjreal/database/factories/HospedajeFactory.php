<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hospedajes>
 */
class HospedajeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [            
            'empleado_id' => \App\Models\Empleado::all()->random()->id_empleado,
            'habitacion_id' => \App\Models\Habitacion::all()->random()->id_habitacion,
            'cantidad_adultos' => $this->faker->numberBetween(1, 4),
            'cantidad_ninos' => $this->faker->numberBetween(0, 3),
            'estado_hospedaje' => $this->faker->randomElement(['reservado', 'cotizado', 'terminado', 'en_curso']),
            'ingreso_hospedaje' => $this->faker->dateTimeBetween('-1 week', '+1 week'),
            'salida_hospedaje' => $this->faker->dateTimeBetween('+1 week', '+2 weeks'),
            'noches_hospedaje' => function (array $attributes) {
                $ingreso = \Illuminate\Support\Carbon::parse($attributes['ingreso_hospedaje']);
                $salida = \Illuminate\Support\Carbon::parse($attributes['salida_hospedaje']);
                return $ingreso->diffInDays($salida);
            },
        ];
    }

    public function parejas() {
        return $this->state(function (array $attributes) {
            return [
                'cantidad_adultos' => 2,
                'cantidad_ninos' => 0,
                'habitacion_id' => \App\Models\Habitacion::all()->where('tipo_habitacion', 'Para pareja')->random()->id_habitacion,
            ];
        });
    }

    public function sencillas() {
        return $this->state(function (array $attributes) {
            return [
                'cantidad_adultos' => 1,
                'cantidad_ninos' => 0,
                'habitacion_id' => \App\Models\Habitacion::all()->where('tipo_habitacion', 'Individual')->random()->id_habitacion,
            ];
        });
    }

    public function familiares() {
        return $this->state(function (array $attributes) {
            return [
                'cantidad_adultos' => 2,
                'cantidad_ninos' => 2,
                'habitacion_id' => \App\Models\Habitacion::all()->where('tipo_habitacion', 'Familiar')->random()->id_habitacion,
            ];
        });
    }

}
