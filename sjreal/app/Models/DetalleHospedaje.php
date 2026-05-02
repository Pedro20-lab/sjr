<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetalleHospedaje extends Model
{   
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'detalle_hospedajes';
    protected $primaryKey = 'id_detalle_hospedaje';
    protected $fillable = [
        'hospedaje_id',
        'huesped_id',
    ];

    /** @use HasFactory<\Database\Factories\DetalleHospedajeFactory> */
    use HasFactory;

    /**
     * Obtiene el hospedaje asociado a este detalle de hospedaje
     */
    public function hospedaje(): BelongsTo
    {
        return $this->belongsTo(Hospedaje::class);
    }

    /**
     * Obtiene el huesped asociado a este detalle de hospedaje
     */
    public function huesped(): BelongsTo
    {
        return $this->belongsTo(Huesped::class);
    }

    public static function addGuests($guests) {

    }

}
