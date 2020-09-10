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

        $gwMock->expects($this->once())->method('charge')->with($this->equalTo(40))->willReturn(true);
        $order = new Order(2, 20.0);

        $this->assertTrue($order->process($gwMock));
    }

    public function test_order_should_be_able_to_process_with_mockery()
    {
        /** @var PaymentGatewayInterface&\Mockery\MockInterface&\Mockery\LegacyMockInterface $gwMock */
        $gwMock = Mockery::mock(FooPayment::class);
        $gwMock->shouldReceive('charge')->once()->with(40)->andReturn(true);

        $order = new Order(2, 20.0);

        $this->assertTrue($order->process($gwMock));
    }

    public function test_it_should_process_using_mock()
    {
        $order = new Order(3, 2);

        $this->assertEquals(6, $order->amount);

        /** @var PaymentGatewayInterface&\Mockery\MockInterface&\Mockery\LegacyMockInterface $gwMock */
        $gwMock = Mockery::mock(FooPayment::class);
        $gwMock->shouldReceive('charge')->once()->with(6);

        $order->process($gwMock);
    }

    public function test_it_should_process_using_spy()
    {
        $order = new Order(3, 2);

        $this->assertEquals(6, $order->amount);

        /** @var PaymentGatewayInterface&\Mockery\MockInterface&\Mockery\LegacyMockInterface $gwMock */
        $gwMock = Mockery::spy(FooPayment::class);

        $order->process($gwMock);

        $gwMock->shouldHaveReceived('charge')->once()->with(6);
    }
}
