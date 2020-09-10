<?php
use PHPUnit\Framework\TestCase;
use Acme\Models\User;

class UserTest extends TestCase
{
    public function test_it_should_return_fullName()
    {
        $user = new User;
        $user->firstName = 'John';
        $user->surName = 'Doe';

        $this->assertEquals('John Doe', $user->getFullName());
    }
}
