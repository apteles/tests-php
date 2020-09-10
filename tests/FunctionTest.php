<?php

use PHPUnit\Framework\TestCase;

class FunctionTest extends TestCase
{
    public function test_it_should_sum_two_numbers()
    {
        require_once __DIR__ . '/../functions.php';

        $this->assertEquals(3, add(2, 1));
        $this->assertEquals(6, add(5, 1));
    }

    public function test_it_should_return_incorrect_sum()
    {
        require_once __DIR__ . '/../functions.php';

        $this->assertNotEquals(10, add(5, 9));
    }
}
