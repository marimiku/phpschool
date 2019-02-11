<?php

function bubble_sort($a)
{
    for ($i = 0; $i < count($a) - 1; $i++) {
        for ($j = count($a) - 1; $j >= $i + 1; $j--) {
            if ($a[$j] < $a[$j - 1]) {
                $a[$j] = $a[$j] ^ $a[$j - 1];
                $a[$j - 1] = $a[$j - 1] ^ $a[$j];
                $a[$j] = $a[$j] ^ $a[$j - 1];
            }
        }
    }
    return $a;
}

$a = [100, 7, 9, 468, -456, 56, 13, 6, -6];
json_encode(bubble_sort($a));
