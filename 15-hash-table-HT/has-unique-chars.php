<?php

//   +=====================================================+
//   |                WRITE YOUR CODE HERE                 |
//   | Description:                                        |
//   | - This function checks if all the characters in a   |
//   |   given string are unique.                          |
//   |                                                     |
//   | Return type: Boolean                                |
//   | - Returns true if all characters are unique.        |
//   | - Returns false otherwise.                          |
//   |                                                     |
//   | Tips:                                               |
//   | - You can use a Set to keep track of seen           |
//   |   characters.                                       |
//   | - If a character is already in the Set, you can     |
//   |   return false immediately.                         |
//   +=====================================================+


function hasUniqueChars(string $string): bool
{
    $arr = str_split($string);
    $obj = [];
    foreach ($arr as $char) {
        if (isset($arr[$char])) {
            return false;
        }
        $arr[$char] = true;
    }
    return true;
}


// ---------------
// Unique Chars
// ---------------
echo "Unique Chars:" . PHP_EOL;
echo "Input: 'abc'" . PHP_EOL;
echo "Output: " . (hasUniqueChars('abc') ? 'true' : 'false') . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// Duplicate Chars
// ---------------
echo "Duplicate Chars:" . PHP_EOL;
echo "Input: 'aabb'" . PHP_EOL;
echo "Output: " . (hasUniqueChars('aabb') ? 'true' : 'false') . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// Single Char
// ---------------
echo "Single Char:" . PHP_EOL;
echo "Input: 'a'" . PHP_EOL;
echo "Output: " . (hasUniqueChars('a') ? 'true' : 'false') . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// Empty String
// ---------------
echo "Empty String:" . PHP_EOL;
echo "Input: ''" . PHP_EOL;
echo "Output: " . (hasUniqueChars('') ? 'true' : 'false') . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// Case Sensitivity
// ---------------
echo "Case Sensitivity:" . PHP_EOL;
echo "Input: 'Aa'" . PHP_EOL;
echo "Output: " . (hasUniqueChars('Aa') ? 'true' : 'false') . PHP_EOL;
echo "---------------" . PHP_EOL;
