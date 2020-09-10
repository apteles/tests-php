<?php

use Acme\Models\Item;
use PHPUnit\Framework\TestCase;

class ItemTest extends TestCase
{
    public function test_it_should_get_an_token_as_string()
    {
        $item = new Item;

        $reflector = new ReflectionClass($item);
        $method = $reflector->getMethod('getToken');
        $method->setAccessible(true);
        $result = $method->invoke($item);

        $this->assertIsString($result);
    }

    public function test_it_should_get_an_token_with_prefix()
    {
        $item = new Item;

        $reflector = new ReflectionClass($item);
        $method = $reflector->getMethod('getTokenPrefixed');
        $method->setAccessible(true);
        $result = $method->invokeArgs($item, ['foo_']);

        $this->assertStringStartsWith('foo_', $result);
    }
}
