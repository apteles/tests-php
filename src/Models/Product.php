<?php

namespace Acme\Models;

class Product extends Item
{
    public function getID(): int
    {
        return parent::getID();
    }
}
