<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Huesped>
 */
class HuespedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [            
            'num_doc_huesped'  => $this->faker->unique()->numerify('##########'),
            'tipo_doc_huesped' => $this->faker->randomElement(["CC","TI","CE","PA","RC","DE","PPT"]),
            'nombre_huesped' => $this->faker->firstName(),
            'apellido_huesped' => $this->faker->lastName(),
            'nacionalidad_huesped' => $this->faker->country(),
            'telefono_huesped' => $this->faker->phoneNumber(),
            'fecha_nacimiento_huesped' => $this->faker->date('Y-m-d', '2008-01-01'),
        ];
    }

    public function menores() {
        return $this->state(function (array $attributes) {
            return [
                'tipo_doc_huesped' => 'TI',
                'fecha_nacimiento_huesped' => $this->faker->dateTimeBetween('-18 years', '-1 year')->format('Y-m-d'),
            ];
        });
    }

    public function mayores() {
        return $this->state(function (array $attributes) {
            return [
                'tipo_doc_huesped' => 'CC',
                'fecha_nacimiento_huesped' => $this->faker->date('Y-m-d', '2006-01-01'),
            ];
        });
    }
}
