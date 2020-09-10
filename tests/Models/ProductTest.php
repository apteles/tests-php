<?php

use Acme\Models\Product;
use PHPUnit\Framework\TestCase;

class ProductTest extends TestCase
{
    public function test_it_should_get_description_non_empty()
    {
        $product = new Product;

        $this->assertNotEmpty($product->getDescription());
    }

    public function test_it_should_get_an_integer_id()
    {
        $product = new Product;
        $this->assertIsInt($product->getID());
    }

    public function test_it_should_get_an_token_as_string()
    {
        $product = new Product;
        $this->assertIsString($product->getToken());
    }
}
