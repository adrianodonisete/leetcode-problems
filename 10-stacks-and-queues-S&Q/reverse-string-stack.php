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

function reverseString($str)
{
    if ($str === '') {
        return '';
    }
    $stack = new Stack();
    array_map(fn($value) => $stack->push($value), str_split($str));
    $reverse = [];
    for ($i = $stack->size() - 1; $i >= 0; $i--) {
        $reverse[] = $stack->pop();
    }
    return implode('', $reverse);
}

$input1 = 'Hello, World!';
$expected1 = '!dlroW ,olleH';
$result1 = reverseString($input1);
echo "Input: \"$input1\" | Expected: \"$expected1\" | Result: \"$result1\"\n";

$input2 = 'abcd';
$expected2 = 'dcba';
$result2 = reverseString($input2);
echo "Input: \"$input2\" | Expected: \"$expected2\" | Result: \"$result2\"\n";

$input3 = '12345';
$expected3 = '54321';
$result3 = reverseString($input3);
echo "Input: \"$input3\" | Expected: \"$expected3\" | Result: \"$result3\"\n";

$input4 = '';
$expected4 = '';
$result4 = reverseString($input4);
echo "Input: \"$input4\" | Expected: \"$expected4\" | Result: \"$result4\"\n";

/*
    EXPECTED OUTPUT:
    ----------------
    Input: "Hello, World!" | Expected: "!dlroW ,olleH" | Result: "!dlroW ,olleH"
    Input: "abcd" | Expected: "dcba" | Result: "dcba"
    Input: "12345" | Expected: "54321" | Result: "54321"
    Input: "" | Expected: "" | Result: ""
*/
