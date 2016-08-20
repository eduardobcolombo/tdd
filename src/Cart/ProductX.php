<?php

namespace CodeEducation\Cart;

class ProductX implements Product
{
    private $name = "Product X";
    private $price = 0;

    public function getName()
    {
        return $this->name;
    }

    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param int $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }
}