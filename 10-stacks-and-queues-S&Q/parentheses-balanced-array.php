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
    $_ = array_map(fn($value) => $stack->push($value), str_split($str));
    $reverse = [];
    for ($i = $stack->size() - 1; $i >= 0; $i--) {
        $reverse[] = $stack->pop();
    }
    return implode('', $reverse);
}

function isBalancedParentheses__first_try(string $parentheses): bool
{
    if (empty($parentheses)) {
        return true;
    }
    $split = str_split($parentheses);
    $countSplit = count($split);

    if ($countSplit % 2 === 1) {
        return false;
    }

    $stackBegin = new Stack();
    $stackEnd = new Stack();
    for ($i = 0; $i < $countSplit; $i++) {
        $stackBegin->push($split[$i]);
    }
    for ($i = 0; $i < $countSplit / 2; $i++) {
        $stackEnd->push($stackBegin->pop());
    }

    $balanced = true;
    for ($i = 0; $i < $countSplit / 2; $i++) {
        if (!($stackBegin->pop() == '(' && $stackEnd->pop() == ')')) {
            $balanced = false;
        }
    }
    return $balanced;
}

function isBalancedParentheses(string $parentheses): bool
{
    if (empty($parentheses)) {
        return true;
    }
    $split = str_split($parentheses);
    $countSplit = count($split);

    if ($countSplit % 2 === 1) {
        return false;
    }

    $stackBegin = new Stack();
    for ($i = 0; $i < $countSplit; $i++) {
        if ($split[$i] === '(') {
            $stackBegin->push($split[$i]);
        } elseif ($split[$i] === ')' && ($stackBegin->isEmpty() || $stackBegin->peek() !== '(')) {
            return false;
        } else {
            $stackBegin->pop();
        }
    }
    return $stackBegin->isEmpty();
}


$input1 = "(())";
$expected1 = true;
$result1 = isBalancedParentheses($input1);
echo "Input: \"{$input1}\" | Expected: " . ($expected1 ? 'true' : 'false') . " | Result: " . ($result1 ? 'true' : 'false') . PHP_EOL;

$input2 = "(()))";
$expected2 = false;
$result2 = isBalancedParentheses($input2);
echo "Input: \"{$input2}\" | Expected: " . ($expected2 ? 'true' : 'false') . " | Result: " . ($result2 ? 'true' : 'false') . PHP_EOL;

$input3 = "((()))";
$expected3 = true;
$result3 = isBalancedParentheses($input3);
echo "Input: \"{$input3}\" | Expected: " . ($expected3 ? 'true' : 'false') . " | Result: " . ($result3 ? 'true' : 'false') . PHP_EOL;

$input4 = "(((())";
$expected4 = false;
$result4 = isBalancedParentheses($input4);
echo "Input: \"{$input4}\" | Expected: " . ($expected4 ? 'true' : 'false') . " | Result: " . ($result4 ? 'true' : 'false') . PHP_EOL;


/*
    EXPECTED OUTPUT:
    ----------------
    Input: "(())" | Expected: true | Result: true
    Input: "(()))" | Expected: false | Result: false
    Input: "((()))" | Expected: true | Result: true
    Input: "(((())" | Expected: false | Result: false

*/
