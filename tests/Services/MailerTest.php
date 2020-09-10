<?php

use Acme\Services\Mailer;
use PHPUnit\Framework\TestCase;

class MailerTest extends TestCase
{
    public function test_mock_mailer()
    {
        $mailerMock = $this->createMock(Mailer::class);
        $mailerMock->method('sendMessage')->willReturn(true);

        $result = $mailerMock->sendMessage('john.doe@domain.com', 'Hello');

        $this->assertTrue($result);
    }
}
