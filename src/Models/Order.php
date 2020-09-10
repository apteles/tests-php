<?php

namespace Acme\Models;

use Acme\Services\PaymentGatewayInterface;

class Order
{
    public int $amount = 0;

    private PaymentGatewayInterface $gateway;

    public function __construct(PaymentGatewayInterface $gateway)
    {
        $this->gateway = $gateway;
    }

    public function process()
    {
        return $this->gateway->charge((float)$this->amount);
    }
}
