<?php

class Node
{
    public int $value;
    public ?Node $left;
    public ?Node $right;

    public function __construct(int $value)
    {
        $this->value = $value;
        $this->left = null;
        $this->right = null;
    }
}

class BST
{
    public ?Node $root;

    public function __construct()
    {
        $this->root = null;
    }

    public function insert(int|float $value): BST
    {
        $newNode = new Node($value);

        if ($this->root == null) {
            $this->root = $newNode;
            return $this;
        }

        $temp = $this->root;
        while ($temp) {
            if ($value < $temp->value) {
                if ($temp->left === null) {
                    $temp->left = $newNode;
                    break;
                }
                $temp = $temp->left;
            } elseif ($value > $temp->value) {
                if ($temp->right === null) {
                    $temp->right = $newNode;
                    break;
                }
                $temp = $temp->right;
            } else {
                // dont add duplicated values
                return $this;
            }
        }
        return $this;
    }
}

$myBST = new BST();

$myBST->insert(2);
$myBST->insert(-1)->insert(6);

/*
    THE LINES ABOVE CREATE THIS TREE:
                 2
                / \
               1   3
*/

echo 'Root: ' . $myBST->root->value . PHP_EOL;
echo 'Root->Left: ' . $myBST->root->left->value . PHP_EOL;
echo 'Root->Right: ' . $myBST->root?->right?->value . PHP_EOL;

/*
    EXPECTED OUTPUT:
    ----------------
    Root: 2
    Root->Left: 1
    Root->Right: 3
*/
