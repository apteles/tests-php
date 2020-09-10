<?php

namespace Acme\Models;

class User
{
    public string $firstName;

    public string $surName;

    public function getFullName(): string
    {
        return "$this->firstName $this->surName";
    }
}
