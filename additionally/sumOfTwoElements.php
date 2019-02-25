<?php

function func($array, $num)
{
    $index1 = [];
    for ($i = 0; $i<count($array); $i++) {
        for ($j = $i; $j<count($array); $j++) {
            if (($array[$i]+$array[$j]) == $num && $i != $j) {
                array_push($index1, [$i, $j]);
            }
        }
    }
    return($index1);

}

$array = [2, 7, 13, 8, 1, 4, 5];
print_r(func($array, 9));