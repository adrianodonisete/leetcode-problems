<?php

//   +=====================================================+
//   |                WRITE YOUR CODE HERE                 |
//   | Description:                                        |
//   | - This function removes duplicate items from a list.|
//   |                                                     |
//   | Return type: Array                                  |
//   | - Returns a new array with all unique elements.     |
//   |                                                     |
//   | Tips:                                               |
//   | - You can use a Set to remove duplicates.           |
//   | - The Array.from() method can convert a Set back to |
//   |   an array.                                         |
//   +=====================================================+



function removeDuplicates(array $arr): array
{
    $obj = [];
    foreach ($arr as $item) {
        if (in_array($item, $obj, true)) {
            continue;
        }
        $obj[] = $item;
    }
    return $obj;
}

// ---------------
// No Duplicates
// ---------------
echo "No Duplicates:" . PHP_EOL;
echo "Input: [1, 2, 3]" . PHP_EOL;
echo "Output: " . json_encode(removeDuplicates([1, 2, 3])) . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// With Duplicates
// ---------------
echo "With Duplicates:" . PHP_EOL;
echo "Input: [1, 2, 2, 3, 3, 3]" . PHP_EOL;
echo "Output: " . json_encode(removeDuplicates([1, 2, 2, 3, 3, 3])) . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// Mixed Types
// ---------------
echo "Mixed Types:" . PHP_EOL;
echo 'Input: [1, "1", true, "true"]' . PHP_EOL;
echo "Output: " . json_encode(removeDuplicates([1, "1", true, "true"])) . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// Empty Array
// ---------------
echo "Empty Array:" . PHP_EOL;
echo "Input: []" . PHP_EOL;
echo "Output: " . json_encode(removeDuplicates([])) . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// Single Element
// ---------------
echo "Single Element:" . PHP_EOL;
echo "Input: [1]" . PHP_EOL;
echo "Output: " . json_encode(removeDuplicates([1])) . PHP_EOL;
echo "---------------" . PHP_EOL;
