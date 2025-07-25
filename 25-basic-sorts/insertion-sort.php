<?php

function insertionSort(array $array): array
{
    $temp = null;
    for ($i = 1; $i < count($array); $i++) {
        $temp = $array[$i];
        for ($j = $i - 1; $j > -1 && $array[$j] > $temp; $j--) {
            $array[$j + 1] = $array[$j];
        }
        $array[$j + 1] = $temp;
    }
    return $array;
}

echo 'insertionSort:', PHP_EOL, json_encode(insertionSort([4, 2, 6, 5, 1, 3]));
