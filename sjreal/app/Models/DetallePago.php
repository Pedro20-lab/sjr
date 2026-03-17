<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetallePago extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'detalle_pagos';

    /** @use HasFactory<\Database\Factories\DetallePagoFactory> */
    use HasFactory;

    /**
     * Obtiene el pago asociado a este detalle de pago
     */
    public function pago(): BelongsTo
    {
        return $this->belongsTo(Pago::class, 'pago_id');
    }

    /**
     * Obtiene el hospedaje asociado a este detalle de pago
     */
    public function hospedaje(): BelongsTo
    {
        return $this->belongsTo(Hospedaje::class, 'hospedaje_id');
    }

}
