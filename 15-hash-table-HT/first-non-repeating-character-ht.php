<?php

class HashTable
{
    public array $dataMap;

    public function __construct(int $size)
    {
        $this->dataMap = array_fill(0, $size, null);
    }

    private function _hash(string $key): string
    {
        $hash = 0;
        $arrKey = str_split($key);
        for ($i = 0; $i < strlen($key); $i++) {
            $hash = ($hash + ord($arrKey[$i]) * 23) % count($this->dataMap);
        }
        return $hash;
    }

    public function printTable(): void
    {
        foreach ($this->dataMap as $i => $bucket) {
            echo $i . ' : ';
            if ($bucket === null) {
                echo 'null';
            } else {
                echo json_encode($bucket);
            }
            echo PHP_EOL;
        }
    }

    public function getHash(string $key): string
    {
        return $this->_hash($key);
    }

    public function set(string $key, mixed $value): self
    {
        $i = $this->_hash($key);
        if (!$this->dataMap[$i]) {
            $this->dataMap[$i] = [];
        }
        $this->dataMap[$i][] = [$key, $value];
        return $this;
    }

    public function get(string $key): mixed
    {
        $i = $this->_hash($key);
        if ($this->dataMap[$i]) {
            foreach ($this->dataMap[$i] as $item) {
                [$k, $value] = $item;
                if ($k === $key) {
                    return $value;
                }
            }
        }
        return null;
    }

    public function keys(): array
    {
        $allKeys = [];
        foreach ($this->dataMap as $item) {
            if ($item) {
                foreach ($item as $pair) {
                    [$key] = $pair;
                    $allKeys[] = $key;
                }
            }
        }
        return $allKeys;
    }
}


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

function firstNonRepeatingChar__UsingHT(string $string): ?string
{
    $arr = str_split($string);
    $ht = new HashTable(7);
    foreach ($arr as $char) {
        $count = $ht->get($char) ?? 0;
        $ht->set($char, $count + 1);
    }

    $first = null;
    // for ($i = 0; $i < 7; $i++) {
    //     if (empty($first) && isset($ht->dataMap[$i]) && count($ht->dataMap[$i]) === 1) {
    //         $first = $ht->dataMap[$i][0][0];
    //     }
    // }
    foreach ($arr as $char) {
        $count = $ht->get($char) ?? 0;
        echo $char, '-', $count, PHP_EOL;
    }

    // echo print_r($ht->dataMap, true) . PHP_EOL;
    return $first;
}

// using object
function firstNonRepeatingChar(string $string): ?string
{
    $arr = str_split($string);
    $obj = [];
    foreach ($arr as $char) {
        $obj[$char] = ($obj[$char] ?? 0) + 1;
    }

    $first = null;
    foreach ($arr as $char) {
        if (isset($obj[$char]) && $obj[$char] === 1) {
            $first = $char;
            break;
        }
    }
    echo print_r($obj, true) . PHP_EOL;
    return $first;
}


// ---------------
// All Unique
// ---------------
echo "All Unique:" . PHP_EOL;
echo "Input: 'abcde'" . PHP_EOL;
echo "Output: " . json_encode(firstNonRepeatingChar('abcde')) . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// Some Duplicates
// ---------------
echo "Some Duplicates:" . PHP_EOL;
echo "Input: 'aabbccdef'" . PHP_EOL;
echo "Output: " . json_encode(firstNonRepeatingChar('aabbccdef')) . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// All Duplicates
// ---------------
echo "All Duplicates:" . PHP_EOL;
echo "Input: 'aabbcc'" . PHP_EOL;
echo "Output: " . json_encode(firstNonRepeatingChar('aabbcc')) . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// Empty String
// ---------------
echo "Empty String:" . PHP_EOL;
echo "Input: ''" . PHP_EOL;
echo "Output: " . json_encode(firstNonRepeatingChar('')) . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// Single Character
// ---------------
echo "Single Character:" . PHP_EOL;
echo "Input: 'a'" . PHP_EOL;
echo "Output: " . json_encode(firstNonRepeatingChar('a')) . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// Multiple Non-Repeating Chars
// ---------------
echo "Multiple Non-Repeating Chars:" . PHP_EOL;
echo "Input: 'abcdaef'" . PHP_EOL;
echo "Output: " . json_encode(firstNonRepeatingChar('abcdaef')) . PHP_EOL;
echo "---------------" . PHP_EOL;
