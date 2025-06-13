<?php

/**
 * https://leetcode.com/problems/add-two-numbers/description/
 */


class ListNode
{
    public $val = 0;
    public $next = null;

    public function __construct($val = 0, $next = null)
    {
        $this->val = $val;
        $this->next = $next;
    }
}

class Solution
{
    /**
     * @param ListNode $l1
     * @param ListNode $l2
     * @return ListNode
     */
    public function addTwoNumbers(ListNode $l1, ListNode $l2): ListNode
    {
        $auxHead = new ListNode();
        $current = $auxHead;
        $auxCarry = 0;

        while (isset($l1) || isset($l2)) {
            $sum = $auxCarry;

            if (isset($l1)) {
                $sum += $l1->val;
                $l1 = $l1->next;
            }

            if (isset($l2)) {
                $sum += $l2->val;
                $l2 = $l2->next;
            }

            $auxCarry = (int) ($sum / 10);
            $current->next = new ListNode($sum % 10);
            $current = $current->next;
        }

        if ($auxCarry > 0) {
            $current->next = new ListNode($auxCarry);
        }

        return $auxHead->next;
    }
}

$solution = new Solution();
$l1 = new ListNode(2, new ListNode(4, new ListNode(3)));
$l2 = new ListNode(5, new ListNode(6, new ListNode(4)));
$result = $solution->addTwoNumbers($l1, $l2);
$current = $result;
$array = [];
while ($current !== null) {
    $array[] = $current->val;
    $current = $current->next;
}
echo '[', implode(', ', $array), ']', PHP_EOL;
