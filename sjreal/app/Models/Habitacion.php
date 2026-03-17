<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Habitacion extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'habitaciones';

    protected $primaryKey = 'id_habitacion';

    /** @use HasFactory<\Database\Factories\HabitacionesFactory> */
    use HasFactory;    

    /**
     * Obtienes los hospedajes asociados a esta habitación
     */
    public function hospedajes(): HasMany
    {
        return $this->hasMany(Hospedaje::class);
    }
}
