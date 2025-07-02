<?php

//   +=====================================================+
//   |                WRITE YOUR CODE HERE                 |
//   | Description:                                        |
//   | - This function finds the length of the longest     |
//   |   consecutive sequence of integers in the given     |
//   |   array.                                            |
//   |                                                     |
//   | Return type: number                                 |
//   | - Returns the length of the longest consecutive     |
//   |   sequence.                                         |
//   | - Returns 0 if the array is empty.                  |
//   |                                                     |
//   | Tips:                                               |
//   | - You can use a Set to track unique numbers.        |
//   | - The function iterates through each unique number  |
//   |   and finds streaks of consecutive numbers.         |
//   +=====================================================+

function longestConsecutiveSequence__V1(array $arr)
{
    $count = 0;
    $before = 0;
    $aux = 0;
    $sequences = [];
    sort($arr, SORT_NUMERIC);
    foreach ($arr as $n) {
        if (isset($sequences[$aux]) && $before + 1 === $n) {
            $sequences[$aux][] = $n;
        } else {
            $aux++;
            $sequences[$aux] = [];
            $sequences[$aux][] = $n;
        }

        $total = count($sequences[$aux]);
        if ($total > 1 && $total > $count) {
            $count = $total;
        }

        $before = $n;
    }
    // echo "seqs: " . print_r($sequences, true) . PHP_EOL;

    return $count;
}


function longestConsecutiveSequence(array $arr)
{
    if (empty($arr)) {
        return 0; // Return 0 if the array is empty
    }

    $count = 1;
    $before = 0;
    $temp = 0;

    sort($arr, SORT_NUMERIC);
    foreach ($arr as $n) {
        if ($before + 1 === $n) {
            $temp++;
        } else {
            $temp = 1;
        }

        if ($temp > $count) {
            $count = $temp;
        }

        $before = $n;
    }
    return $count;
}


// echo "teste:" . PHP_EOL;
// $arr = [1, 3, 5, 18, 4, 6];
// echo "Input: " . json_encode($arr) . PHP_EOL;
// echo "Output: " . json_encode(longestConsecutiveSequence($arr)) . PHP_EOL;
// echo "---------------" . PHP_EOL;

// -------------------
// No Consecutive Sequence
// -------------------
echo "No Consecutive Sequence:" . PHP_EOL;
echo "Input: [1, 3, 5]" . PHP_EOL;
echo "Output: " . json_encode(longestConsecutiveSequence([1, 3, 5])) . PHP_EOL;
echo "---------------" . PHP_EOL;

// -------------------
// Single Element
// -------------------
echo "Single Element:" . PHP_EOL;
echo "Input: [1]" . PHP_EOL;
echo "Output: " . json_encode(longestConsecutiveSequence([1])) . PHP_EOL;
echo "---------------" . PHP_EOL;

// -------------------
// Consecutive Sequence
// -------------------
echo "Consecutive Sequence:" . PHP_EOL;
echo "Input: [1, 2, 3, 4, 5]" . PHP_EOL;
echo "Output: " . json_encode(longestConsecutiveSequence([1, 2, 3, 4, 5])) . PHP_EOL;
echo "---------------" . PHP_EOL;

// -------------------
// Unordered Input
// -------------------
echo "Unordered Input:" . PHP_EOL;
echo "Input: [5, 2, 3, 1, 4]" . PHP_EOL;
echo "Output: " . json_encode(longestConsecutiveSequence([5, 2, 3, 1, 4])) . PHP_EOL;
echo "---------------" . PHP_EOL;

// -------------------
// Empty Array
// -------------------
echo "Empty Array:" . PHP_EOL;
echo "Input: []" . PHP_EOL;
echo "Output: " . json_encode(longestConsecutiveSequence([])) . PHP_EOL;
echo "---------------" . PHP_EOL;

// -------------------
// Multiple Sequences
// -------------------
echo "Multiple Sequences:" . PHP_EOL;
echo "Input: [1, 2, 3, 10, 11, 12]" . PHP_EOL;
echo "Output: " . json_encode(longestConsecutiveSequence([1, 2, 3, 10, 11, 12])) . PHP_EOL;
echo "---------------" . PHP_EOL;
