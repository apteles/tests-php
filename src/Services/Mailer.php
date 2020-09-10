<?php

namespace Acme\Services;

use Exception;

class Mailer
{
    public function sendMessage(string $email, string $message): bool
    {
        if (!\filter_var($email, FILTER_VALIDATE_EMAIL)) {
            throw new Exception('Invalid email');
        }
        /**
         * simulate the delay that services like this (mail, PHPMailer) takes to perform.
         */
        \sleep(3);

        echo "sent {$message} to {$email}";

        return true;
    }

    public function send(string $email, string $message): bool
    {
        return $this->sendMessage($email, "Greeting {$message}");
    }
}
