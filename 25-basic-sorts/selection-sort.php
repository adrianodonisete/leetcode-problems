<?php

function selectionSort(array $array): array
{
    $min = 0;
    for ($i = 0; $i < count($array) - 1; $i++) {
        $min = $i;
        for ($j = $i + 1; $j < count($array); $j++) {
            if ($array[$j] < $array[$min]) {
                $min = $j;
            }
        }

        if ($i !== $min) {
            $temp = $array[$i];
            $array[$i] = $array[$min];
            $array[$min] = $temp;
        }
    }
    return $array;
}

echo 'selectionSort:', PHP_EOL, json_encode(selectionSort([4, 2, 6, 5, 1, 3]));
