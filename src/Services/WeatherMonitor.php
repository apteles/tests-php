<?php

namespace Acme\Services;

class WeatherMonitor
{
    private TemperatureService $service;

    public function __construct(TemperatureService $service)
    {
        $this->service = $service;
    }

    public function getAverageTemperature(string $start, string $end): float
    {
        $startTime = $this->service->getTemperature($start);
        $endTime = $this->service->getTemperature($end);

        return ($startTime + $endTime) / 2;
    }
}
