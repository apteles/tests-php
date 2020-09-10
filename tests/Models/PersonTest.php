<?php

use Acme\Models\Client;
use Acme\Models\Person;
use PHPUnit\Framework\TestCase;

class PersonTest extends TestCase
{
    public function test_it_should_be_able_get_info()
    {
        $client = new Client('John Doe');

        $this->assertEquals('client: John Doe', $client->getInfo());
    }

    public function test_it_should_be_able_get_info_alternative()
    {
        /** @var Person&\PHPUnit\Framework\MockObject\MockObject $mock */
        $mock = $this->getMockBuilder(Person::class)
                    ->setConstructorArgs(['John Doe'])
                    ->getMockForAbstractClass();
        $mock->method('role')->willReturn('client');

        $this->assertEquals('client: John Doe', $mock->getInfo());
    }
}
