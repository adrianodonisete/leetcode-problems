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

    public function contains(int|float $value): bool
    {
        $temp = $this->root;
        while ($temp) {
            if ($value === $temp->value) {
                return true;
            } elseif ($value < $temp->value) {
                $temp = $temp->left;
            } else {
                $temp = $temp->right;
            }
        }
        return false;
    }
}

$myBST = new BST();

$myBST->insert(16)->insert(-1)->insert(6)->insert(20)->insert(130)->insert(-8)->insert(1);


echo 'Root: ' . $myBST->root->value . PHP_EOL;
echo 'Root->Left: ' . $myBST->root->left->value . PHP_EOL;
echo 'Root->Right: ' . $myBST->root?->right?->value . PHP_EOL . PHP_EOL;

echo 'Contains 2: ' . ($myBST->contains(2) ? 'Yes' : 'No') . PHP_EOL;
echo 'Contains 130: ' . ($myBST->contains(130) ? 'Yes' : 'No') . PHP_EOL;
echo 'Contains 1: ' . ($myBST->contains(1) ? 'Yes' : 'No') . PHP_EOL;

/*
    EXPECTED OUTPUT:
    ----------------
    Root: 2
    Root->Left: 1
    Root->Right: 3
*/
