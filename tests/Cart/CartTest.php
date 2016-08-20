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

    // It is a unit test using mock
    public function test_if_cart_items_are_being_returned()
    {
        // With mock options we can emulate a class and specifie return values.
        $productX = $this->getMockBuilder(ProductX::class)->getMock();
        // declare method and assign returns
        $productX->method('getPrice')->willReturn(22);
        $productX->method('getName')->willReturn("Product MOCKED");

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