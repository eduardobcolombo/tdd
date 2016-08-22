<?php

namespace CodeEducation\Cart\Tests;

use CodeEducation\Cart\CupomPercentage;

class CupomPercentageTest extends \PHPUnit_Framework_TestCase
{
    public function test_check_if_cupom_is_returning_the_correct_applied_discount()
    {
        $cupom = new CupomPercentage();
        $cupom->setTotal(10);
        $totalCart = 200;

        $this->assertEquals(180,$cupom->getTotal($totalCart));
    }
}