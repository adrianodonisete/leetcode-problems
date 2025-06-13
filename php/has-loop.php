<?php

class Node
{
    const NULL_NODE = null;

    /** @var int */
    public $value;
    /** @var ?Node */
    public $next;

    public function __construct(int $value)
    {
        $this->value = $value;
        $this->next = Node::NULL_NODE;
    }
}

// LinkedList class
class LinkedList
{
    /** @var ?Node */
    public $head;
    /** @var ?Node */
    public $tail;

    public function __construct(int $value)
    {
        $newNode = new Node($value);
        $this->head = $newNode;
        $this->tail = $this->head;
    }

    public function printList(): void
    {
        $temp = $this->head;
        while ($temp) {
            echo $temp->value . "\n";
            $temp = $temp->next;
        }
    }

    public function getHead(): void
    {
        if ($this->head === Node::NULL_NODE) {
            echo "Head: null\n";
        } else {
            echo "Head: " . $this->head->value . "\n";
        }
    }

    public function getTail(): void
    {
        if ($this->tail === Node::NULL_NODE) {
            echo "Tail: null\n";
        } else {
            echo "Tail: " . $this->tail->value . "\n";
        }
    }

    public function makeEmpty(): void
    {
        $this->head = Node::NULL_NODE;
        $this->tail = Node::NULL_NODE;
    }

    public function push(int $value): void
    {
        $newNode = new Node($value);
        if (!$this->head) {
            $this->head = $newNode;
            $this->tail = $newNode;
        } else {
            $this->tail->next = $newNode;
            $this->tail = $newNode;
        }
    }

    // Find the middle node
    public function findMiddleNode(): ?Node
    {
        $slow = $this->head;
        $fast = $this->head;
        while ($fast?->next) {
            $slow = $slow->next;
            $fast = $fast->next;
            if ($fast) {
                $fast = $fast->next;
            }
        }
        return $slow;
    }

    public function hasLoop()
    {
        $slow = $this->head;
        $fast = $this->head;
        while ($fast?->next) {
            $slow = $slow->next;
            $fast = $fast->next->next;
            if ($slow === $fast) {
                return true;
            }
        }
        return false;
    }
}

$myLinkedList = new LinkedList(1);
$myLinkedList->push(2);
$myLinkedList->push(3);
$myLinkedList->push(4);
$myLinkedList->push(5);

echo "Original list:\n";
$myLinkedList->printList();

$hasLoopResult = $myLinkedList->hasLoop();
echo "\nHas loop? " . ($hasLoopResult ? 'true' : 'false') . "\n";

// Create a loop for testing purposes
$myLinkedList->tail->next = $myLinkedList->head->next; // Create a loop by linking tail to the second node

$hasLoopResultAfterLoop = $myLinkedList->hasLoop();
echo "\nHas loop after creating a loop? " . ($hasLoopResultAfterLoop ? 'true' : 'false') . "\n";


/*
    EXPECTED OUTPUT:
    ----------------
    Original list:
    1
    2
    3
    4
    5
    Has loop? false
    Has loop after creating a loop? true
*/
