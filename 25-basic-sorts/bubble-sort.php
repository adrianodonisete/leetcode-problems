<?php

function bubbleSort(array $array): array
{
    for ($i = count($array) - 1; $i > 0; $i--) {
        for ($j = 0; $j < $i; $j++) {
            if ($array[$j] > $array[$j + 1]) {
                $temp = $array[$j];
                $array[$j] = $array[$j + 1];
                $array[$j + 1] = $temp;
            }
        }
    }
    return $array;
}

echo 'bubbleSort:', PHP_EOL, json_encode(bubbleSort([2, 8, 1, 6, 4, 3, 9, 12]));
