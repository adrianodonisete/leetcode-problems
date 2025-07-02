
<?php

//   +=====================================================+
//   |                WRITE YOUR CODE HERE                 |
//   | Description:                                        |
//   | - This function finds all the pairs of numbers that |
//   |   sum up to a given target.                         |
//   | - One number is taken from arr1 and the other from  |
//   |   arr2.                                             |
//   |                                                     |
//   | Return type: Array of Arrays                        |
//   | - Returns an array of pairs that sum to the target. |
//   | - Each pair is an array [num1, num2].               |
//   | - Returns an empty array if no such pairs exist.    |
//   |                                                     |
//   | Tips:                                               |
//   | - You can use a Set to keep track of numbers from   |
//   |   arr1.                                             |
//   | - Then iterate through arr2 to find complementing   |
//   |   numbers.                                          |
//   +=====================================================+


function findPairs(array $a1, array $a2, int $target): array
{
    $pairs = [];
    foreach ($a1 as $n1) {
        foreach ($a2 as $n2) {
            if ($n1 + $n2 === $target) {
                $pairs[] = [$n1, $n2];
            }
        }
    }
    return $pairs;
}


// -------------------
// Single Pair Matching
// -------------------
echo "Single Pair Matching:" . PHP_EOL;
echo "Input: [1, 2, 3], [4, 5, 6], 7" . PHP_EOL;
echo "Output: " . json_encode(findPairs([1, 2, 3], [4, 5, 6], 7)) . PHP_EOL;
echo "---------------" . PHP_EOL;

// -------------------
// Multiple Pairs
// -------------------
echo "Multiple Pairs:" . PHP_EOL;
echo "Input: [1, 2, 3], [7, 6, 5], 8" . PHP_EOL;
echo "Output: " . json_encode(findPairs([1, 2, 3], [7, 6, 5], 8)) . PHP_EOL;
echo "---------------" . PHP_EOL;

// -------------------
// No Matching Pairs
// -------------------
echo "No Matching Pairs:" . PHP_EOL;
echo "Input: [1, 2, 3], [7, 8, 9], 5" . PHP_EOL;
echo "Output: " . json_encode(findPairs([1, 2, 3], [7, 8, 9], 5)) . PHP_EOL;
echo "---------------" . PHP_EOL;

// -------------------
// Empty Arrays
// -------------------
echo "Empty Arrays:" . PHP_EOL;
echo "Input: [], [], 10" . PHP_EOL;
echo "Output: " . json_encode(findPairs([], [], 10)) . PHP_EOL;
echo "---------------" . PHP_EOL;

// -------------------
// One Empty Array
// -------------------
echo "One Empty Array:" . PHP_EOL;
echo "Input: [1, 2, 3], [], 4" . PHP_EOL;
echo "Output: " . json_encode(findPairs([1, 2, 3], [], 4)) . PHP_EOL;
echo "---------------" . PHP_EOL;
