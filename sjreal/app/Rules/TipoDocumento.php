<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class TipoDocumento implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string, ?string=): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {   
        $cuenta = 0;
        $tipos_admitidos = ['CC', 'TI', 'RC', 'CE', 'PAS', 'DE', 'PPT'];
        foreach ($tipos_admitidos as $tipo) {
            if ($value === $tipo) {
                $cuenta = 1;
            }
        }
        if ($cuenta === 0) {
            $fail('El tipo de documento debe ser de alguno de los provistos (CC, TI, RC, CE, PAS, DE, PPT)');
        }
    }
}
