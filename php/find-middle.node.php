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
}

$myLinkedList = new LinkedList(1);
$myLinkedList->push(2);
$myLinkedList->push(3);
$myLinkedList->push(4);
$myLinkedList->push(5);

echo "Original list:\n";
$myLinkedList->printList();

$middleNode = $myLinkedList->findMiddleNode();
echo "\nMiddle node value: " . $middleNode->value . "\n";

// Create a new list with an even number of elements
$myLinkedList2 = new LinkedList(1);
$myLinkedList2->push(2);
$myLinkedList2->push(3);
$myLinkedList2->push(4);
$myLinkedList2->push(5);
$myLinkedList2->push(6);

echo "\nOriginal list 2:\n";
$myLinkedList2->printList();

$middleNode2 = $myLinkedList2->findMiddleNode();
echo "\nMiddle node value of list 2: " . $middleNode2->value . "\n";

// single element list
$single = new LinkedList(1);
echo "\nSingle list:\n";
$single->printList();
$middleSingle = $single->findMiddleNode();
echo "\nMiddle node value of single list: " . $middleSingle->value . "\n";

/*
EXPECTED OUTPUT:
----------------
Original list:
1
2
3
4
5
Middle node value: 3
Original list 2:
1
2
3
4
5
6
Middle node value of list 2: 4
Single list:
1
Middle node value of single list: 1
*/
