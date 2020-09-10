<?php

namespace Acme\Services;

interface PaymentGatewayInterface
{
    public function charge(float $ammount): bool;
}
