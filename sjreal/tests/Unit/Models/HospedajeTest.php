<?php

namespace Tests\Unit\Models;

use PHPUnit\Framework\TestCase;
use App\Models\Hospedaje;

class HospedajeTest extends TestCase
{
    private $guestsAllMinors = [
        ['isMinor' => true],
        ['isMinor' => true],
        ['isMinor' => true],
    ];

    private $guestsMixed = [
        ['isMinor' => true],
        ['isMinor' => false],
        ['isMinor' => true],
    ];

    private $guestsEmpty = [];
    /**
     * Find the amount of minors in a hospedaje
     */

    public function test_counts_kids_when_all_are_minors()
    {
        $resultAllMinors = Hospedaje::getAmountKids($this->guestsAllMinors);

        $this->assertEquals(3, $resultAllMinors);
    }

    public function test_counts_kids_when_mixed() 
    {
        $resultMixed = Hospedaje::getAmountKids($this->guestsMixed);

        $this->assertEquals(2, $resultMixed);
    }

    public function test_counts_kids_when_empty() 
    {   
        $resultEmpty = Hospedaje::getAmountKids($this->guestsEmpty);

        $this->assertEquals(0, $resultEmpty);
    }


    /**
     * Find the amount of adults in a hospedaje
     */
    public function test_counts_adults_when_all_are_minors() 
    {
        $resultAllMinors = Hospedaje::getAmountAdults($this->guestsAllMinors);
        $this->assertEquals(0, $resultAllMinors);
    }
    public function test_counts_adults_when_mixed() 
    {
        $resultMixed = Hospedaje::getAmountAdults($this->guestsMixed);
        $this->assertEquals(1, $resultMixed);
    }
    public function test_counts_adults_when_empty() 
    {
        $resultEmpty = Hospedaje::getAmountAdults($this->guestsEmpty);
        $this->assertEquals(0, $resultEmpty);
    }
    
}
