<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Hospedaje extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'hospedajes';
    private $childTypes = ['TI', 'RC'];
    protected $fillable = [
            'empleado_id',
            'habitacion_id',
            'cantidad_adultos',
            'cantidad_ninos',
            'noches_hospedaje',
            'estado_hospedaje',        
            'ingreso_hospedaje',
            'salida_hospedaje',
    ];

    /** @use HasFactory<\Database\Factories\HospedajesFactory> */
    use HasFactory;

    /**
     * Obtiene los huespedes de este hospedaje a traves de una tabla de particion 'detalle_hospedajes'
     */
    public function huespedes(): BelongsToMany
    {
        return $this->belongsToMany(Huesped::class, 'detalle_hospedajes', 'hospedaje_id', 'huesped_id');
    }


    /**
     * Obtiene los huespedes asociados a este hospedaje a traves de los detalles
     */
    public function detalles(): HasMany
    {
        return $this->hasMany(DetalleHospedaje::class, 'hospedaje_id');
    }

    /**
     * Obtiene los detalles de pago de este hospedaje
     */
    public function detallesPago(): HasMany
    {
        return $this->hasMany(DetallePago::class, 'hospedaje_id');
    }

    /**
     * Obtiene la habitación asociada a este hospedaje
     */
    public function habitacion(): BelongsTo
    {
        return $this->belongsTo(Habitacion::class, 'habitacion_id');
    }

    /**
     * Obtiene el empleado que atendió este hospedaje
     */
    public function empleado(): BelongsTo
    {
        return $this->belongsTo(Empleado::class, 'empleado_id');
    }

    public static function getAmountKids($guests) {
        $amountKids = collect($guests)
            ->filter(fn ($guest) => $guest['isMinor'] == true)
            ->count();
        return $amountKids;
    }

    public static function getAmountAdults($guests) {
        $amountAdults = collect($guests)
            ->filter(fn ($guest) => $guest['isMinor'] == false)
            ->count();
        return $amountAdults;
    }

}