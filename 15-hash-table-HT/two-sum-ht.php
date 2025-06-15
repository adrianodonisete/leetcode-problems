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

    public function set__OLD(string $key, mixed $value): self
    {
        $i = $this->_hash($key);
        if (!$this->dataMap[$i]) {
            $this->dataMap[$i] = [];
        }
        $this->dataMap[$i][] = [$key, $value];
        return $this;
    }

    public function set(string $key, mixed $value): self
    {
        $i = $this->_hash($key);
        if (!$this->dataMap[$i]) {
            $this->dataMap[$i] = [];
        }

        $pairs = [];
        $hasPair = false;
        foreach ($this->dataMap[$i] as $kv) {
            [$k] = $kv;
            if ($k === $key) {
                $kv = [$key, $value];
                $hasPair = true;
            }
            $pairs[] = $kv;
        }
        if (!$hasPair) {
            $pairs[] = [$key, $value];
        }
        $this->dataMap[$i] = $pairs;
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

    public function has(string $key): bool
    {
        foreach ($this->dataMap as $data) {
            if ($data) {
                foreach ($data as $item) {
                    [$k] = $item;
                    if ($k === $key) {
                        return true;
                    }
                }
            }
        }
        return false;
    }
}

//   +=====================================================+
//   |                WRITE YOUR CODE HERE                 |
//   | Description:                                        |
//   | - This function finds two numbers in the array      |
//   |   that add up to the target value.                  |
//   |                                                     |
//   | Return type: array                                  |
//   | - Returns an array containing the indices of the    |
//   |   two numbers that sum to the target.               |
//   | - Returns an empty array if no such numbers exist.  |
//   |                                                     |
//   | Tips:                                               |
//   | - You can use either a Map or an object to track    |
//   |   the numbers and their indices.                    |
//   | - Example with Map:                                 |
//   |   numMap.set(num, i);                               |
//   | - Example with object:                              |
//   |   numObject[num] = i;                               |
//   +=====================================================+


function twoSumObject_MySolution(array $nums, int $target): array
{
    $temp = [];
    foreach ($nums as $i => $num) {
        foreach ($temp as $j => $n) {
            if ($i != $j && $num + $n === $target) {
                return [$j, $i];
            }
        }
        $temp[$i] = $num;
    }
    return [];
}

function twoSumObject(array $nums, int $target): array
{
    $temp = [];
    foreach ($nums as $i => $num) {
        $diff = $target - $num;
        if (isset($temp[$diff])) {
            return [$temp[$diff], $i];
        }
        $temp[$num] = $i;
    }
    return [];
}

function twoSumMap__mySolution(array $nums, int $target): array
{
    $ht = new HashTable(7);
    foreach ($nums as $i => $num) {
        foreach ($ht->dataMap as $data) {
            if ($data) {
                foreach ($data as $item) {
                    [$j, $n] = $item;
                    if ($i != $j && $n + $num === $target) {
                        return [(int) $j, $i];
                    }
                }
            }
        }
        $ht->set($i, $num);
    }
    return [];
}

function twoSumMap(array $nums, int $target): array
{
    $ht = new HashTable(7);
    foreach ($nums as $i => $num) {
        $diff = $target - $num;
        $j = $ht->get($diff);
        if ($j !== null) {
            return [$j, $i];
        }
        $ht->set($num, $i);
    }
    return [];
}

function twoSum(array $nums, int $target): array
{
    return twoSumObject($nums, $target);
}

// ---------------
// Unique Solution
// ---------------
echo "Unique Solution:" . PHP_EOL;
echo "Input: [2, 7, 11, 15], Target: 9" . PHP_EOL;
echo "Output: " . json_encode(twoSum([2, 7, 11, 15], 9)) . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// Duplicate Numbers
// ---------------
echo "Duplicate Numbers:" . PHP_EOL;
echo "Input: [3, 3, 11, 15], Target: 6" . PHP_EOL;
echo "Output: " . json_encode(twoSum([3, 3, 11, 15], 6)) . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// No Solution
// ---------------
echo "No Solution:" . PHP_EOL;
echo "Input: [2, 7, 11, 15], Target: 30" . PHP_EOL;
echo "Output: " . json_encode(twoSum([2, 7, 11, 15], 30)) . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// Negative Numbers
// ---------------
echo "Negative Numbers:" . PHP_EOL;
echo "Input: [-1, -2, -3, -4, -5], Target: -8" . PHP_EOL;
echo "Output: " . json_encode(twoSum([-1, -2, -3, -4, -5], -8)) . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// Empty Array
// ---------------
echo "Empty Array:" . PHP_EOL;
echo "Input: [], Target: 0" . PHP_EOL;
echo "Output: " . json_encode(twoSum([], 0)) . PHP_EOL;
echo "---------------" . PHP_EOL;
