<?php

use PHPUnit\Framework\TestCase;
use Acme\Services\WeatherMonitor;
use Acme\Services\TemperatureService;

class WatherMonitorTest extends TestCase
{
    public function tearDown():void
    {
        Mockery::close();
    }

    public function test_it_should_return_avarage_correct()
    {
        $service = $this->createMock(TemperatureService::class);
        $map = [
            ['12:00', 20],
            ['14:00', 26]
        ];
        $service->expects($this->exactly(2))->method('getTemperature')->will($this->returnValueMap($map));
        $weather = new WeatherMonitor($service);

        $this->assertEquals(23, $weather->getAverageTemperature('12:00', '14:00'));
    }

    public function test_it_should_return_avarage_correct_with_mockery()
    {
        /** @var TemperatureService&\Mockery\MockInterface&\Mockery\LegacyMockInterface $service */
        $service = Mockery::mock(TemperatureService::class);
        $service->shouldReceive('getTemperature')->once()->with('12:00')->andReturn(20);
        $service->shouldReceive('getTemperature')->once()->with('14:00')->andReturn(26);
        $weather = new WeatherMonitor($service);

        $this->assertEquals(23, $weather->getAverageTemperature('12:00', '14:00'));
    }
}
