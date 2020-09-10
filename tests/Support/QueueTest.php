<?php
use PHPUnit\Framework\TestCase;
use Acme\Support\Queue;

class QueueTest extends TestCase
{
    public function test_it_should_be_empty_when_instantiated()
    {
        $queue = new Queue;

        $this->assertEquals(0, $queue->count());

        return $queue;
    }

    /**
     * @depends test_it_should_be_empty_when_instantiated
     */
    public function test_it_should_be_able_add_item_to_queue(Queue $queue)
    {
        $queue->push('Green');

        $this->assertEquals(1, $queue->count());

        return $queue;
    }

    /**
     * @depends test_it_should_be_able_add_item_to_queue
     */
    public function test_it_should_be_able_remove_item_from_queue(Queue $queue)
    {
        $queue->pop();

        $this->assertEquals(0, $queue->count());
    }
}
