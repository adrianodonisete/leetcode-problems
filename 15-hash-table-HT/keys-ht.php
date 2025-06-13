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

    public function get___MySolution(string $key): mixed
    {
        $i = $this->_hash($key);
        if ($this->dataMap[$i]) {
            $filter = array_filter(
                $this->dataMap[$i],
                function ($item) use ($key) {
                    [$k, $_] = $item;
                    return $k === $key;
                }
            );
            $pair = array_pop($filter);
            if ($pair) {
                [$_, $value] = $pair;
                return $value;
            }
        }
        return null;
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

$myHT = new HashTable(7);
$myHT->set('bolts', 1204)
    ->set('nails', 124)
    ->set('whateveritis', 88)
    ->set('whateverit', 8);

$myHT->printTable();

// echo '<pre>', print_r($myHT->dataMap, true), '</pre>';
// echo 'Value bolts: ', $myHT->get('bolts') . PHP_EOL;
// echo 'Value whateverit: ', $myHT->get('whateverit') . PHP_EOL;
// echo 'Value whateveritis: ', $myHT->get('whateveritis') . PHP_EOL;
// echo 'Value nails: ', $myHT->get('nails') . PHP_EOL;
// echo 'get nails', $myHT->get('nails') . PHP_EOL;
// echo 'get volts', $myHT->get('volts') . PHP_EOL;

echo print_r($myHT->keys(), true), PHP_EOL;
