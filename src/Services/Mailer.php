<?php

namespace Acme\Services;

class Mailer
{
    public function sendMessage(string $email, string $message): bool
    {
        /**
         * simulate the delay that services like this (mail, PHPMailer) takes to perform.
         */
        sleep(3);

        echo "sent {$message} to {$email}";

        return true;
    }
}
