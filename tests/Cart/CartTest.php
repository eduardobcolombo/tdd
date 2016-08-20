<?php

namespace CodeEducation\Cart\Tests;

use CodeEducation\Cart\Cart;
use CodeEducation\Cart\ProductX;
use CodeEducation\Cart\Cupom;

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

    // test with cupom unit test too
    public function test_apply_cupom_and_check_if_its_returning_the_correct_total()
    {
        // With mock options we can emulate a class and specifie return values.
        $productX = $this->getMockBuilder(ProductX::class)->getMock();
        // declare method and assign returns
        $productX->method('getPrice')->willReturn(15);
        $productX->method('getName')->willReturn("Product MOCKED");

        $cupom = $this->getMockBuilder(Cupom::class)->getMock();
        $cupom->method('getTotal')->willReturn(10);
        $cupom->method('getType')->willReturn("currency");

        $cart = new Cart();
        $cart->addProduct($productX);
        // adding cupom
        $cart->applyCupom($cupom);
        $total = $cart->getTotal();

        $this->assertEquals(5, $total);
    }

    // test with cupom unit test too
    public function test_apply_cupom_with_type_percentage_and_check_if_its_returning_the_correct_total()
    {
        // With mock options we can emulate a class and specifie return values.
        $productX = $this->getMockBuilder(ProductX::class)->getMock();
        // declare method and assign returns
        $productX->method('getPrice')->willReturn(15);
        $productX->method('getName')->willReturn("Product MOCKED");

        $cupom = $this->getMockBuilder(Cupom::class)->getMock();
        $cupom->method('getTotal')->willReturn(10);
        $cupom->method('getType')->willReturn("percent");

        $cart = new Cart();
        $cart->addProduct($productX);
        // adding cupom
        $cart->applyCupom($cupom);
        $total = $cart->getTotal();

        $this->assertEquals(13.50, $total);
    }
}