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

    public function getTotal()
    {
        return $this->total;
    }

    public function getItems()
    {
        return $this->items;
    }
}