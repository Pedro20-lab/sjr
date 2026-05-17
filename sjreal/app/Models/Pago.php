<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Pago extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pagos';
    protected $primaryKey = 'id_pago';

    protected $fillable = [
        'monto_total',
        'fecha_pago',
        'cliente_id',
    ];
    /** @use HasFactory<\Database\Factories\PagoFactory> */
    use HasFactory;

    /**
     * Obtiene los detalles de pago asociados a este pago
     */
    public function detalles(): HasMany
    {
        return $this->hasMany(DetallePago::class);
    }
}
