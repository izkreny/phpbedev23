<?php

namespace WebShop;

class Product
{
    private $name;
    private $price;

    public function __construct($name, $price)
    {
        $this->name = $name;
        $this->price = $price;
    }

    public function getPrice()
    {
        return $this->price;
    }
}

class Cart
{
    private $cart = [];

    public function addProduct(Product $product)
    {
        $this->cart[] = $product;
    }

    public function calculateTotalAmount()
    {
        $sum = 0;
        foreach ($this->cart as $product)
            $sum += $product->getPrice();

        return $sum;
    }
}

use \WebShop\Product as PR;
use \WebShop\Cart as KS;

$pr1 = new PR("Apple", 10);
$pr2 = new PR("Pear", 20);

$cart = new KS();
$cart->addProduct($pr1);
$cart->addProduct($pr2);

echo "Total amount: " . $cart->calculateTotalAmount() . PHP_EOL;
