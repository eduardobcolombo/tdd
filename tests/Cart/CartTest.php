<?php

namespace CodeEducation\Cart\Tests;

use CodeEducation\Cart\Cart;
use CodeEducation\Cart\ProductX;

class CartTest extends \PHPUnit_Framework_TestCase
{

    public function test_check_cart_total_when_add_a_product()
    {
        $productX = new ProductX();
        $productX->setPrice(15);

        $cart = new Cart();
        $cart->addProduct($productX);

        $this->assertEquals(15, $cart->getTotal());
        $cart->addProduct($productX);

        $this->assertEquals(30, $cart->getTotal());
    }

    public function test_if_cart_items_are_being_returned()
    {
        $productX = new ProductX();
        $productX->setPrice(15);

        $cart = new Cart();
        $cart->addProduct($productX);

        $items = $cart->getItems();

        $itemsExpected = [
            0 => [
                'name' => 'Product X',
                'price' => 15
            ]
        ];

        $this->assertEquals($itemsExpected, $items);

    }
}