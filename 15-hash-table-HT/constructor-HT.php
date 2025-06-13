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

    public function getHash(string $key): string
    {
        return $this->_hash($key);
    }
}

$myHT = new HashTable(7);
echo 'bolts: ', $myHT->getHash('bolts') . PHP_EOL;
echo 'nails: ', $myHT->getHash('nails') . PHP_EOL;
echo 'whateverit: ', $myHT->getHash('whateverit') . PHP_EOL;
