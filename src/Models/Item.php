<?php

namespace Acme\Models;

class Item
{
    public function getDescription():string
    {
        return (string) $this->getID() . $this->getToken();
    }

    protected function getID(): int
    {
        return \rand();
    }

    private function getToken(): string
    {
        return \uniqid();
    }

    private function getTokenPrefixed(string $prefix): string
    {
        return \uniqid($prefix);
    }
}
