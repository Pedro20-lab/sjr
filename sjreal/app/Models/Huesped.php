<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Huesped extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'huespedes';

    /** @use HasFactory<\Database\Factories\HuespedFactory> */
    use HasFactory;

    /**
     * Obtiene los hospedajes de este huesped a traves de una tabla de particion 'detalle_hospedajes'
     */
    public function hospedajes(): BelongsToMany
    {
        return $this->belongsToMany(Hospedaje::class, 'detalle_hospedajes', 'huesped_id', 'hospedaje_id');
    }

    /**
     * Obtiene los detalles de hospedajede este huesped
     */
    public function detalles(): HasMany
    {
        return $this->hasMany(DetalleHospedaje::class);
    }
}