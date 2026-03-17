<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetalleHospedaje>
 */
class DetalleHospedajeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   
        // Solo por defecto, no usarlo de preferencia
        return [
            'hospedaje_id' => $this->faker->numberBetween(1, 15),
            'huesped_id' => $this->faker->numberBetween(1, 40),
        ];
    }

    /** Esto funciona sabiendo de antemano que los IDs de los
     * huespedes y los hospedajes son secuenciales: 
     * Del 1 al 30 adultos, del 31 al 40 niños
     * Del 1 al 5 son hospedajes de pareja
     * Del 6 al 10 son hospedajes de personas solas (Individuales)
     * Del 11 al 15 son hospedajes de familias
     * Solo para fines de prueba
    */

    public function para_adultos() {
        return $this->state(fn (array $attributes) => [            
            'huesped_id' => $this->faker->numberBetween(1, 30),
        ]);
    }

    public function para_ninos() {
        return $this->state(fn (array $attributes) => [            
            'huesped_id' => $this->faker->numberBetween(31, 40),
        ]);
    }

}
