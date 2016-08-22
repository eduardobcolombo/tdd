<?php

namespace CodeEducation\Cart\Tests;

use CodeEducation\Cart\Cupom;

class CupomTest extends \PHPUnit_Framework_TestCase
{
    public function test_check_if_cupom_is_returning_the_correct_applied_discount()
    {
        $cupom = new Cupom();
        $cupom->setTotal(15);
        $totalCart = 100;

        $this->assertEquals(85,$cupom->getTotal($totalCart));
    }
}