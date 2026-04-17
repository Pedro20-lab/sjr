<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Laravel\Sanctum\HasApiTokens;

class Empleado extends Authenticatable
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'empleados';
    protected $primaryKey = 'id_empleado';
    //protected $authPasswordName = 'password_empleado';

    protected $fillable = [
        'nombre_empleado',
        'apellido_empleado',
        'tipo_doc_empleado',
        'numero_doc_empleado',
        'telefono_empleado',
        'password',
        'email',
        'rol_empleado',
    ];

    /** @use HasFactory<\Database\Factories\EmpleadoFactory> */
    use HasFactory;
    use HasApiTokens;

    /**
     * Obtiene los hospedajes atendidos por este empleado
     */
    /*public function hospedajes(): HasMany
    {
        return $this->hasMany(Hospedaje::class);
    }*/

}