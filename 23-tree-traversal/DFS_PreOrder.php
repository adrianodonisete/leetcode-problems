<?php

class Node
{
    public int $value;
    public ?Node $left = null;
    public ?Node $right = null;

    public function __construct(int $value)
    {
        $this->value = $value;
    }
}

class BST
{
    public ?Node $root = null;

    public function insert(int $value): self
    {
        $newNode = new Node($value);
        if ($this->root === null) {
            $this->root = $newNode;
            return $this;
        }
        $temp = $this->root;
        while (true) {
            if ($newNode->value === $temp->value) {
                return $this;
            }
            if ($newNode->value < $temp->value) {
                if ($temp->left === null) {
                    $temp->left = $newNode;
                    return $this;
                }
                $temp = $temp->left;
            } else {
                if ($temp->right === null) {
                    $temp->right = $newNode;
                    return $this;
                }
                $temp = $temp->right;
            }
        }
    }

    public function DFSPreOrder(): array
    {
        $results = [];
        $this->traversePre($this->root, $results);
        return $results;
    }

    private function traversePre(?Node $current, array &$results): void
    {
        $results[] = $current->value;
        if ($current->left) {
            $this->traversePre($current->left, $results);
        }
        if ($current->right) {
            $this->traversePre($current->right, $results);
        }
    }
}

function test()
{
    $myTree = new BST();

    $myTree->insert(47);
    $myTree->insert(21);
    $myTree->insert(76);
    $myTree->insert(18);
    $myTree->insert(27);
    $myTree->insert(52);
    $myTree->insert(82);

    echo json_encode($myTree->DFSPreOrder());
}

test();

/*
    EXPECTED OUTPUT:
    ----------------
    Array
    [47,21,18,27,76,52,82]
*/
