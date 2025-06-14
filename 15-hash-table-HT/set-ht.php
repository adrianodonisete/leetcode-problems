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

        $new = [];
        $exists = false;
        foreach ($this->dataMap[$i] as $kv) {
            [$k] = $kv;
            if ($k === $key) {
                $kv = [$key, $value];
                $exists = true;
            }
            $new[] = $kv;
        }
        if (!$exists) {
            $new[] = [$key, $value];
        }
        $this->dataMap[$i] = $new;
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

$myHT = new HashTable(7);
$myHT->set('bolts', 1204)
    ->set('nails', 124)
    ->set('whateverit', 8)
    ->set('bolts', 13);

$myHT->printTable();

echo PHP_EOL, 'bolts: ', $myHT->get('bolts');
