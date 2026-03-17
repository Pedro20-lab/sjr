<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Clientes>
 */
class ClienteFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'tipo_doc_cliente' => $this->faker->randomElement(['CC', 'NIT']),
            'num_doc_cliente' => $this->faker->numerify('##########'),
            'tipo_cliente' => $this->faker->randomElement(['Natural', 'Jurídica']),
            'nombre_cliente' => $this->faker->name(),
        ];
    }

    public function empresas() {
        return $this->state(function (array $attributes){
            return [
                'tipo_doc_cliente' => 'NIT',
                'tipo_cliente' => 'Jurídica',
                'nombre_cliente' => $this->faker->company(),
            ];
        });
    }

    public function personas() {
        return $this->state(function (array $attributes){
            return [
                'tipo_doc_cliente' => 'CC',
                'tipo_cliente' => 'Natural',
            ];
        });
    }
}
