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


function sortStack___MySolution(Stack $stack): void
{
    $array = [];
    for ($i = $stack->size() - 1; $i >= 0; $i--) {
        $array[] = $stack->pop();
    }
    rsort($array, SORT_NUMERIC);
    array_map(fn(int $value) => $stack->push($value), $array);
}

function sortStack(Stack $stack): void
{
    $auxStack = new Stack();

    while (!$stack->isEmpty()) {
        $temp = $stack->pop();
        while (!$auxStack->isEmpty() && $auxStack->peek() > $temp) {
            $stack->push($auxStack->pop());
        }
        $auxStack->push($temp);
    }

    while (!$auxStack->isEmpty()) {
        $stack->push($auxStack->pop());
    }
}

function stackToString(Stack $stack): string
{
    return json_encode($stack->getStackList());
}

// Test case 1
$stack1 = new Stack();
$stack1->push(5);
$stack1->push(3);
$stack1->push(8);
$stack1->push(1);
$expected1 = json_encode([8, 5, 3, 1]);
sortStack($stack1);
$result1 = stackToString($stack1);
echo "Test case 1 | Expected: {$expected1} | Result: {$result1}\n";

// Test case 2
$stack2 = new Stack();
$stack2->push(9);
$stack2->push(4);
$stack2->push(7);
$stack2->push(2);
$expected2 = json_encode([9, 7, 4, 2]);
sortStack($stack2);
$result2 = stackToString($stack2);
echo "Test case 2 | Expected: {$expected2} | Result: {$result2}\n";

// Test case 3
$stack3 = new Stack();
$stack3->push(10);
$stack3->push(6);
$stack3->push(3);
$stack3->push(1);
$stack3->push(5);
$expected3 = json_encode([10, 6, 5, 3, 1]);
sortStack($stack3);
$result3 = stackToString($stack3);
echo "Test case 3 | Expected: {$expected3} | Result: {$result3}\n";

/*
    EXPECTED OUTPUT:
    ----------------
    Test case 1 | Expected: [8,5,3,1] | Result: [8,5,3,1]
    Test case 2 | Expected: [9,7,4,2] | Result: [9,7,4,2]
    Test case 3 | Expected: [10,6,5,3,1] | Result: [10,6,5,3,1]

*/
