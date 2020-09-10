<?php

namespace Acme\Models;

use Acme\Services\Mailer;

class User
{
    public string $firstName;

    public string $surName;

    public string $email;

    protected Mailer $mailer;

    public function getFullName(): string
    {
        return \trim("$this->firstName $this->surName");
    }

    public function setMailer(Mailer $mailer)
    {
        $this->mailer = $mailer;
    }

    public function notify(string $message): bool
    {
        return $this->mailer->sendMessage($this->email, $message);
    }

    public function notifyGreeting(string $message)
    {
        return $this->mailer::send($this->email, $message);
    }
}
