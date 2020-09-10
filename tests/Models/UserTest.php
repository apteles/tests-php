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
        $mockMailer->expects($this->once())->method('sendMessage')->with($this->equalTo('john.doe@domain.com'), $this->equalTo('Hello'))->willReturn(true);

        $user->setMailer($mockMailer);

        $this->assertTrue($user->notify('Hello'));
    }

    public function test_should_not_send_message_with_email_invalid()
    {
        $user = new User;
        $user->email = 'jon.doe-domain.com.br';
        
        /** @var Mailer&\PHPUnit\Framework\MockObject\MockObject $mockMailer */

        $mockMailer = $this->getMockBuilder(Mailer::class)->getMock();
        $mockMailer->method('sendMessage')->will($this->throwException(new Exception()));
        $user->setMailer($mockMailer);

        $this->expectException(Exception::class);
        $user->notify('Hello');
    }
}
