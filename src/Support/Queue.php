<?php

namespace Acme\Support;

class Queue
{
    public const MAX_ITEMS = 5;

    private array $items = [];


    public function push($item): void
    {
        if ($this->count() === static::MAX_ITEMS) {
            throw new QueueException('Queue is full');
        }
        
        $this->items[] = $item;
    }

    /**
     * @return mixed
     */
    public function pop()
    {
        return array_shift($this->items);
    }

    public function count(): int
    {
        return count($this->items);
    }
}
