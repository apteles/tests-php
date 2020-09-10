<?php

namespace Acme\Support;

class Queue
{
    private array $items = [];


    public function push($item): void
    {
        $this->items[] = $item;
    }

    /**
     * @return mixed
     */
    public function pop()
    {
        return array_pop($this->items);
    }

    public function count(): int
    {
        return count($this->items);
    }
}
