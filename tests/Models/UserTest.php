<?php
use PHPUnit\Framework\TestCase;
use Acme\Models\User;
use Acme\Services\Mailer;

class UserTest extends TestCase
{
    public function test_it_should_return_fullName()
    {
        $user = new User;
        $user->firstName = 'John';
        $user->surName = 'Doe';

        $this->assertEquals('John Doe', $user->getFullName());
    }

    public function test_user_should_be_able_send_notification()
    {
        $user = new User;
        $user->email = 'john.doe@domain.com';

        $mockMailer = $this->createMock(Mailer::class);
        $mockMailer->method('sendMessage')->willReturn(true);

        $user->setMailer($mockMailer);
        
        $this->assertTrue($user->notify('Hello'));
    }
}
