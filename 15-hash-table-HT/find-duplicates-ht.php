<?php
// +======================================================+
// | WRITE YOUR CODE HERE |
// | Description: |
// | - This function finds duplicate numbers in an array. |
// | |
// | Return type: array |
// | - Returns an array containing the duplicate numbers. |
// | |
// | Tips: |
// | - You can use either a Map or an object for |
// | counting occurrences of each number. |
// | - Example with Map: |
// | numCounts.set(num, (numCounts.get(num) || 0) + 1); |
// | - Example with object: |
// | numCounts[num] = (numCounts[num] || 0) + 1; |
// +======================================================+

function findDuplicates($arr)
{
    $duplicates = [];
    $temp = [];
    foreach ($arr as $value) {
        if (isset($temp[$value]) && !in_array($value, $duplicates)) {
            $duplicates[] = $value;
            continue;
        }
        $temp[$value] = true;
    }
    return $duplicates;
}

echo "---------------\n";
echo "No Duplicates:\n";
echo "Input: [1, 2, 3, 4, 5]\n";
echo "Output: " . json_encode(findDuplicates([1, 2, 3, 4, 5])) . "\n";
echo "---------------\n";

echo "---------------\n";
echo "Single Duplicate:\n";
echo "Input: [1, 2, 2, 3, 4]\n";
echo "Output: " . json_encode(findDuplicates([1, 2, 2, 3, 4])) . "\n";
echo "---------------\n";

echo "---------------\n";
echo "Multiple Duplicates:\n";
echo "Input: [1, 1, 2, 2, 3, 4]\n";
echo "Output: " . json_encode(findDuplicates([1, 1, 2, 2, 3, 4])) . "\n";
echo "---------------\n";

echo "---------------\n";
echo "Repeating Duplicates:\n";
echo "Input: [1, 1, 1, 2, 2, 2, 3]\n";
echo "Output: " . json_encode(findDuplicates([1, 1, 1, 2, 2, 2, 3])) . "\n";
echo "---------------\n";

echo "---------------\n";
echo "Empty Array:\n";
echo "Input: []\n";
echo "Output: " . json_encode(findDuplicates([])) . "\n";
echo "---------------\n";

echo "---------------\n";
echo "Single Element:\n";
echo "Input: [1]\n";
echo "Output: " . json_encode(findDuplicates([1])) . "\n";
echo "---------------\n";
