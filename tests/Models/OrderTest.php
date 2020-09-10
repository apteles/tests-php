<?php

use Acme\Models\Order;
use PHPUnit\Framework\TestCase;
use Acme\Services\PaymentGatewayInterface;

class FooPayment implements PaymentGatewayInterface
{
    public function charge(float $ammount): bool
    {
        return true;
    }
}
class OrderTest extends TestCase
{
    public function tearDown(): void
    {
        Mockery::close();
    }

    public function test_order_should_be_able_to_process()
    {
        /** @var PaymentGatewayInterface&\PHPUnit\Framework\MockObject\MockObject $gwMock */
        $gwMock = $this->getMockBuilder(FooPayment::class)->onlyMethods(['charge'])->getMock();

        $gwMock->expects($this->once())->method('charge')->with($this->equalTo(200))->willReturn(true);
        $order = new Order($gwMock);
        $order->amount = 200;

        $this->assertTrue($order->process());
    }

    public function test_order_should_be_able_to_process_with_mockery()
    {
        /** @var PaymentGatewayInterface&\Mockery\MockInterface&\Mockery\LegacyMockInterface $gwMock */
        $gwMock = Mockery::mock(FooPayment::class);
        $gwMock->shouldReceive('charge')->once()->with(200)->andReturn(true);

        $order = new Order($gwMock);
        $order->amount = 200;

        $this->assertTrue($order->process());
    }
}
