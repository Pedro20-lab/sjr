<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Empleado extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'empleados';

    /** @use HasFactory<\Database\Factories\EmpleadoFactory> */
    use HasFactory;

    /**
     * Obtiene los hospedajes atendidos por este empleado
     */
    public function hospedajes(): HasMany
    {
        return $this->hasMany(Hospedaje::class);
    }

}
