<?php

namespace Acme\Models;

use Acme\Services\PaymentGatewayInterface;

class Order
{
    public int $amount = 0;

    public float $price;

    public int $quantity;

    public function __construct(int $quantity, float $price)
    {
        $this->quantity = $quantity;
        $this->price = $price;
        $this->amount = $quantity * $price;
    }

    public function process(PaymentGatewayInterface $gateway)
    {
        return $gateway->charge((float)$this->amount);
    }
}
