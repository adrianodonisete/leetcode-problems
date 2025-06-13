<?php

class TreeNode
{
    public $val;
    public $left;
    public $right;

    public function __construct($val = 0, $left = null, $right = null)
    {
        $this->val = $val;
        $this->left = $left;
        $this->right = $right;
    }
}

class Solution
{
    /**
     * @param TreeNode $root
     * @return NULL
     */
    public static function flatten(&$root)
    {
        $current = $root;

        while ($current !== null) {
            if ($current->left !== null) {
                $predecessor = $current->left;

                while ($predecessor->right !== null) {
                    $predecessor = $predecessor->right;
                }

                $predecessor->right = $current->right;
                $current->right = $current->left;
                $current->left = null;
            }

            $current = $current->right;
        }
    }

    public static function print(TreeNode $root): void
    {
        $current = $root;
        $array = [];
        while ($current !== null) {
            if ($current->val !== null || $current->left !== null || $current->right !== null) {
                $array[] = $current->val === null ? "null" : $current->val;
            }

            $current = $current->right;
        }

        echo '[', implode(', ', $array), ']', PHP_EOL;
    }
}

// Example 1:
$root = new TreeNode(1);
$root->left = new TreeNode(2);
$root->right = new TreeNode(5);
$root->left->left = new TreeNode(3);
$root->left->right = new TreeNode(4);
$root->right->left = new TreeNode(null);
$root->right->right = new TreeNode(6);
Solution::flatten($root);
Solution::print($root); // Output: [1, 2, 3, 4, 5, null, 6]


// Example 2:
$root = new TreeNode(null);
Solution::flatten($root);
Solution::print($root); // Output: []


// Example 3:
$root = new TreeNode(0);
Solution::flatten($root);
Solution::print($root); // Output: [0]
