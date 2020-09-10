<?php

namespace Acme\Models;

abstract class Person
{
    public string $surname;

    public function __construct(string $surname)
    {
        $this->surname = $surname;
    }

    public function getInfo(): string
    {
        return $this->role() . ': ' . $this->surname;
    }

    abstract protected function role():string;
}
