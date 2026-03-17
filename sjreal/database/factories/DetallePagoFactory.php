<?php

namespace Database\Factories;

use App\Models\DetallePago;
use App\Models\Pago;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DetallePago>
 */
class DetallePagoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pago_id' => 1,
            'hospedaje_id' => 1,
            'cantidad_item' => function (array $attributes) {
                return $cantidad_noches = \App\Models\Hospedaje::where('id_hospedaje', $attributes['hospedaje_id'])->first()->noches_hospedaje;
            },
            'precio_por_unidad' => function (array $attributes) {
                $id_habitacion = \App\Models\Hospedaje::where('id_hospedaje', $attributes['hospedaje_id'])->first()->habitacion_id;
                return $precio_por_noche = \App\Models\Habitacion::where('id_habitacion', $id_habitacion)->first()->precio_habitacion;
            },
            'total_detalle' => function (array $attributes) {
                return $attributes['cantidad_item'] * $attributes['precio_por_unidad'];
            },
            'fecha_pago' => $this->faker->date(),
            'metodo_pago' => $this->faker->randomElement(['efectivo', 'transferencia']),
            'estado_pago' => $this->faker->randomElement(['pendiente', 'completado']),
            'descripcion_pago' => 'Pago servicio hospedaje',
        ];
    }

    public function configure(): static
    {
        return $this->afterMaking(function (DetallePago $detallePago) {            
        })->afterCreating(function (DetallePago $detallePago) {
            $id_pago = $detallePago->pago_id;
            $pago = Pago::where('id_pago', $id_pago)->first();
            $pago->where('id_pago', $id_pago)->update([
                'monto_total' => $detallePago->total_detalle,
                'fecha_pago' => $detallePago->fecha_pago,
            ]);
        });
    }
}
