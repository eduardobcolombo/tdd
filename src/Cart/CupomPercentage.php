<?php

namespace CodeEducation\Cart;


class CupomPercentage extends Cupom
{
    private $total;
    /**
     * @return mixed
     */
    public function getTotal($cartTotal)
    {
        return $cartTotal - $cartTotal * $this->total / 100;
    }
    /**
     * @param mixed $total
     */
    public function setTotal($total)
    {
        $this->total = $total;
    }

}