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
//   |               WRITE YOUR CODE HERE                  |
//   | Description:                                        |
//   | - This function finds a subarray that sums up to    |
//   |   the target value.                                 |
//   |                                                     |
//   | Return type: array                                  |
//   | - Returns an array with the start and end indices   |
//   |   of the subarray.                                  |
//   | - Returns an empty array if no such subarray exists.|
//   |                                                     |
//   | Tips:                                               |
//   | - You can use either a Map or an object to track    |
//   |   the sums and their indices.                       |
//   | - Example with Map:                                 |
//   |   sumIndex.set(currentSum, i);                      |
//   | - Example with object:                              |
//   |   sumIndex[currentSum] = i;                         |
//   +=====================================================+


function subarraySumObject(array $nums, int $target): array
{
    foreach ($nums as $slice => $_) {
        $arr = array_slice($nums, $slice, count($nums), true);

        $temp = [];
        $sum = 0;
        foreach ($arr as $i => $num) {
            $sum += $num;
            if (empty($temp)) {
                $temp[] = $i;
            }

            if ($sum === $target) {
                $temp[] = $i;
                return $temp;
            }

            if ($sum > $target) {
                break;
            }
        }
    }
    return [];
}

function subarraySumMap(array $nums, int $target): array
{
    $ht = new HashTable(7);
    foreach ($nums as $i => $num) {
        $ht->set($num, $i);
    }
    return [];
}

function subarraySum(array $nums, int $target): array
{
    return subarraySumObject($nums, $target);
}

// ---------------
// Positive Numbers
// ---------------
echo "Positive Numbers:" . PHP_EOL;
echo "Input: [2, 4, 6, 3], Target: 10" . PHP_EOL;
echo "Output: " . json_encode(subarraySum([2, 4, 6, 3], 10)) . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// Includes Zero
// ---------------
echo "Includes Zero:" . PHP_EOL;
echo "Input: [1, 2, 3, 0, 4], Target: 6" . PHP_EOL;
echo "Output: " . json_encode(subarraySum([1, 2, 3, 0, 4], 6)) . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// Negative Numbers
// ---------------
echo "Negative Numbers:" . PHP_EOL;
echo "Input: [1, -1, 2, 3], Target: 4" . PHP_EOL;
echo "Output: " . json_encode(subarraySum([1, -1, 2, 3], 4)) . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// No Subarray
// ---------------
echo "No Subarray:" . PHP_EOL;
echo "Input: [1, 2, 3, 4], Target: 10" . PHP_EOL;
echo "Output: " . json_encode(subarraySum([1, 2, 3, 4], 10)) . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// Empty Array
// ---------------
echo "Empty Array:" . PHP_EOL;
echo "Input: [], Target: 1" . PHP_EOL;
echo "Output: " . json_encode(subarraySum([], 1)) . PHP_EOL;
echo "---------------" . PHP_EOL;
