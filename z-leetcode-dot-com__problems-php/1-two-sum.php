<?php

class Solution
{
    public function twoSum2(array $nums, int $target): array
    {
        $map = [];

        foreach ($nums as $i => $num) {
            $complement = $target - $num;
            if (isset($map[$complement])) {
                return [$map[$complement], $i];
            }
            $map[$num] = $i;
        }

        return [];
    }

    public function twoSum($nums, $target)
    {
        $size = count($nums);
        $left = 0;
        $right = $size - 1;

        $array = [];
        while (true) {
            if ($left == $right) {
                $left = 0;
                $right--;
            }

            if ($nums[$left] + $nums[$right] == $target) {
                return [$left, $right];
            }

            $left++;
        }

        return $array;
    }
}

$solution = new Solution();


$nums = [2, 7, 11, 15];
$target = 9;
$result = $solution->twoSum($nums, $target);
echo '[', implode(', ', $result), ']', PHP_EOL;


$nums = [3, 2, 4];
$target = 6;
$result = $solution->twoSum($nums, $target);
echo '[', implode(', ', $result), ']', PHP_EOL;
