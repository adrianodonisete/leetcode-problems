<?php

class Stack
{
    private $stackList = [];

    public function getStackList()
    {
        return $this->stackList;
    }

    public function printStack()
    {
        for ($i = count($this->stackList) - 1; $i >= 0; $i--) {
            echo $this->stackList[$i] . PHP_EOL;
        }
    }

    public function isEmpty()
    {
        return count($this->stackList) === 0;
    }

    public function peek()
    {
        if ($this->isEmpty()) {
            return null;
        } else {
            return $this->stackList[count($this->stackList) - 1];
        }
    }

    public function size()
    {
        return count($this->stackList);
    }

    public function push($value)
    {
        $this->stackList[] = $value;
    }

    public function pop()
    {
        if ($this->isEmpty()) {
            return null;
        }
        return array_pop($this->stackList);
    }
}

class MyQueue
{
    private Stack $stack1;
    private Stack $stack2;

    public function __construct()
    {
        $this->stack1 = new Stack();
        $this->stack2 = new Stack();
    }

    public function peek()
    {
        return $this->stack1->peek();
    }

    public function isEmpty()
    {
        return $this->stack1->isEmpty();
    }

    public function enqueue(mixed $value): void
    {
        while (!$this->stack1->isEmpty()) {
            $this->stack2->push($this->stack1->pop());
        }
        $this->stack1->push($value);
        while (!$this->stack2->isEmpty()) {
            $this->stack1->push($this->stack2->pop());
        }
    }
}


$queue = new MyQueue();

echo "Is the queue empty? " . ($queue->isEmpty() ? 'true' : 'false') . PHP_EOL;

// Assuming you want to implement enqueue method in MyQueue
$queue->enqueue(1);
echo "Peek after enqueueing 1: " . $queue->peek() . PHP_EOL;

$queue->enqueue(2);
echo "Peek after enqueueing 2: " . $queue->peek() . PHP_EOL;

$queue->enqueue(3);
echo "Peek after enqueueing 3: " . $queue->peek() . PHP_EOL;

echo "Is the queue empty? " . ($queue->isEmpty() ? 'true' : 'false') . PHP_EOL;
