<?php
use PHPUnit\Framework\TestCase;
use Acme\Support\Queue;
use Acme\Support\QueueException;

/**
 * https://phpunit.readthedocs.io/en/9.3/fixtures.html
 */
class QueueTest extends TestCase
{
    protected ?Queue $queue;
    
    protected function setUp(): void
    {
        $this->queue = new Queue;
    }

    public function tearDown(): void
    {
        $this->queue = null;
    }
    

    public function test_it_should_be_empty_when_instantiated()
    {
        $this->assertEquals(0, $this->queue->count());
    }

    
    public function test_it_should_be_able_add_item_to_queue()
    {
        $this->queue->push('Green');

        $this->assertEquals(1, $this->queue->count());
    }

   
    public function test_it_should_be_able_remove_item_from_queue()
    {
        $this->queue->pop();

        $this->assertEquals(0, $this->queue->count());
    }

    public function test_it_should_be_able_remove_item_from_top_of_queue()
    {
        $this->queue->push('first');
        $this->queue->push('second');

        $this->assertEquals('first', $this->queue->pop());
    }

    public function test_it_should_be_able_add_item_until_max()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            $this->queue->push($i);
        }

        $this->assertEquals(Queue::MAX_ITEMS, $this->queue->count());
    }

    public function test_it_should_return_exception_when_queue_size_exceeded()
    {
        for ($i = 0; $i < Queue::MAX_ITEMS; $i++) {
            $this->queue->push($i);
        }
        $this->expectException(QueueException::class);
        $this->queue->push('more one');
    }
}
