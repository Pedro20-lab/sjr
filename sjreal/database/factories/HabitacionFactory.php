<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Habitaciones>
 */
class HabitacionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [            
            'numero_habitacion' => $this->faker->randomElement([
                '201', '202', '203', '204', '205', '206', '207',
                '301', '302', '303', '304', '305', '306', '307',
                '401', '402', '403', '404', '405', '406', '407',
            ]),
            'tipo_habitacion' => $this->faker->randomElement(['Individual', 'Para pareja', 'Familiar']),
            'capacidad_habitacion' => $this->faker->randomElement([1, 2, 4]),
            'piso_habitacion' => function (array $attributes) {
                return $attributes['numero_habitacion'][0];
            },
            'precio_habitacion' => $this->faker->randomFloat(2, 50000, 150000),
        ];
    }

    public function sencillas() {
        return $this->state(function (array $attributes) {
            return [
            'numero_habitacion' => $this->faker->randomElement(['202', '205', '207',]),
            'tipo_habitacion' => 'Individual',
            'capacidad_habitacion' => 1,            
            'precio_habitacion' => $this->faker->randomFloat(2, 50000, 60000),
            ];
        });
    }    

    public function dobles() {
        return $this->state(function (array $attributes) {
            return [
            'numero_habitacion' => $this->faker->randomElement([
                '201', '203', '204',
                '301', '303', '304',
                '401', '403', '407',
            ]),
            'tipo_habitacion' => 'Para pareja',
            'capacidad_habitacion' => 2,            
            'precio_habitacion' => $this->faker->randomFloat(2, 80000, 100000),
            ];
        });        
    }

    public function familiares() {
        return $this->state(function (array $attributes) {
            return [
            'numero_habitacion' => $this->faker->randomElement([
                '206',
                '306',
                '406',
            ]),
            'tipo_habitacion' => 'Familiar',
            'capacidad_habitacion' => 4,            
            'precio_habitacion' => $this->faker->randomFloat(2, 120000, 150000),
            ];
        });
    }

}
