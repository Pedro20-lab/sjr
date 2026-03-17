<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empleado>
*/
class EmpleadoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nombre_empleado' => $this->faker->firstName(),
            'apellido_empleado' => $this->faker->lastName(),
            'tipo_doc_empleado' => $this->faker->randomElement(['CC', 'PSA']),
            'numero_doc_empleado' => $this->faker->unique()->numberBetween(1000000000, 9999999999),
            'telefono' => $this->faker->phoneNumber(),
            'password_empleado' => bcrypt('password'),
            'rol_empleado' => $this->faker->randomElement(['admin', 'user']),
        ];
    }
}
