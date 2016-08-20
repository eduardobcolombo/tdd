<?php

namespace CodeEducation\Cart;

class Cart
{
    private $total;
    private $items = [];

    public function addProduct(Product $product)
    {
        $newItem = [
            'name'  => $product->getName(),
            'price' => $product->getPrice()
        ];
        array_push($this->items, $newItem);

        $this->total += $product->getPrice();
    }

    public function applyCupom(Cupom $cupom)
    {
        // it is incorrect because the business logics be in cupom
        if ($cupom->getType() == "percent") {
            $c = $this->total * $cupom->getTotal() / 100;
        } else {
            $c = $cupom->getTotal();
        }
        $this->total -= $c;
    }

    public function getTotal()
    {
        return $this->total;
    }

    public function getItems()
    {
        return $this->items;
    }
}