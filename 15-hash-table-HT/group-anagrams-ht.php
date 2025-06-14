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
//   |                 WRITE YOUR CODE HERE                |
//   | Description:                                        |
//   | - This function groups anagrams from an array       |
//   |   of strings.                                       |
//   |                                                     |
//   | Return type: array                                  |
//   | - Returns an array of arrays where each array       |
//   |   contains anagrams.                                |
//   |                                                     |
//   | Tips:                                               |
//   | - You can use either a Map or an object to manage   |
//   |   the groups of anagrams.                           |
//   | - Example with Map:                                 |
//   |   anagramGroups.set(canonical, group);              |
//   | - Example with object:                              |
//   |   anagramGroups[canonical] = group;                 |
//   +=====================================================+

function groupAnagrams__Object(array $strings): array
{
    $obj = [];
    foreach ($strings as $string) {
        $aux = str_split($string);
        sort($aux, SORT_STRING);
        $key = implode('', $aux);
        if (!isset($obj[$key])) {
            $obj[$key] = [];
        }
        $obj[$key][] = $string;
    }

    return array_values($obj);
}

function groupAnagrams__Map(array $strings): array
{
    $ht = new HashTable(7);

    foreach ($strings as $string) {
        $aux = str_split($string);
        sort($aux, SORT_STRING);
        $key = implode('', $aux);
        if ($ht->has($key)) {
            $group = $ht->get($key);
            $group[] = $string;
        } else {
            $group = [$string];
        }
        $ht->set($key, $group);
    }

    $array = [];
    $allKeys = $ht->keys();
    foreach ($allKeys as $k) {
        $array[] = $ht->get($k);
    }
    return $array;
}

function groupAnagrams(array $strings): array
{
    return groupAnagrams__Map($strings);
}

// ---------------
// Lowercase Anagrams
// ---------------
echo "Lowercase Anagrams:" . PHP_EOL;
echo "Input: ['eat', 'tea', 'tan', 'ate', 'nat', 'bat']" . PHP_EOL;
echo "Output: " . json_encode(groupAnagrams(['eat', 'tea', 'tan', 'ate', 'nat', 'bat'])) . PHP_EOL;
echo "---------------" . PHP_EOL;
exit;


// ---------------
// Mixed Case Anagrams
// ---------------
echo "Mixed Case Anagrams:" . PHP_EOL;
echo "Input: ['Eat', 'Tea', 'Tan', 'Ate', 'Nat', 'Bat']" . PHP_EOL;
echo "Output: " . json_encode(groupAnagrams(['Eat', 'Tea', 'Tan', 'Ate', 'Nat', 'Bat'])) . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// No Anagrams
// ---------------
echo "No Anagrams:" . PHP_EOL;
echo "Input: ['hello', 'world', 'test']" . PHP_EOL;
echo "Output: " . json_encode(groupAnagrams(['hello', 'world', 'test'])) . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// Empty Strings
// ---------------
echo "Empty Strings:" . PHP_EOL;
echo "Input: ['', '', '']" . PHP_EOL;
echo "Output: " . json_encode(groupAnagrams(['', '', ''])) . PHP_EOL;
echo "---------------" . PHP_EOL;

// ---------------
// Single Characters

// ---------------
echo "Single Characters:" . PHP_EOL;
echo "Input: ['a', 'b', 'a']" . PHP_EOL;
echo "Output: " . json_encode(groupAnagrams(['a', 'b', 'a'])) . PHP_EOL;
echo "---------------" . PHP_EOL;
