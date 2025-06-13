<?php


/**
 * LeetCode 153 - Find Minimum in Rotated Sorted Array
 * https://leetcode.com/problems/find-minimum-in-rotated-sorted-array/description/
 * 
 * https://algo.monster/problems/stats
 */
class RotateArray
{
    public function rotate(array $array, int $rotates): array
    {
        if ($rotates === 0) {
            return $array;
        }

        $size = count($array);
        $last = $size - 1;
        $aux = [];
        for ($i = 1; $i <= $rotates; $i++) {
            $aux = [$array[$last]];
            $aux = [...$aux, ...array_slice($array, 0, $size - 1)];
            $array = $aux;
        }

        return $array;
    }

    public function findMin(array $array): ?int
    {
        $size = count($array);
        if ($size === 0) {
            return null;
        }
        $left = 0;
        $right = $size - 1;

        while ($left < $right) {
            $mid = (int) round(($left + $right) / 2, 0, PHP_ROUND_HALF_DOWN);
            if ($array[$mid] > $array[$right]) {
                $left = $mid + 1;
            } else {
                $right = $mid;
            }
        }

        return $array[$left];
    }
}

$rotate = new RotateArray();

/*
Example 1:
    Input: nums = [3,4,5,1,2]
    Output: 1
    Explanation: The original array was [1,2,3,4,5] rotated 3 times. 
*/
$example1 = [1, 2, 3, 4, 5];
$rotated1 = $rotate->rotate($example1, 3);
echo '[', implode(', ', $rotated1), ']', PHP_EOL;
echo 'Min: ', $rotate->findMin($rotated1), PHP_EOL;


/*
Example 2:
    Input: nums = [4,5,6,7,0,1,2]
    Output: 0
    Explanation: The original array was [0,1,2,4,5,6,7] and it was rotated 4 times.
*/
$example2 = [0, 1, 2, 4, 5, 6, 7];
$rotated2 = $rotate->rotate($example2, 4);
echo '[', implode(', ', $rotated2), ']', PHP_EOL;
echo 'Min: ', $rotate->findMin($rotated2), PHP_EOL;


/*
Example 3:
    Input: nums = [11,13,15,17]
    Output: 11
    Explanation: The original array was [11,13,15,17] and it was rotated 4 times.
*/
$example3 = [11, 13, 15, 17];
$rotated3 = $rotate->rotate($example3, 4);
echo '[', implode(', ', $rotated3), ']', PHP_EOL;
echo 'Min: ', $rotate->findMin($rotated3), PHP_EOL;
