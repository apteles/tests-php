<?php

namespace Acme\Models;

class Client extends Person
{
    protected function role():string
    {
        return 'client';
    }
}
