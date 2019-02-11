<?php

function horizontal_snake($dimension)
{
    $h = $line = 1;
    for ($i = 0; $i < $dimension; $i++, $line++) {
        if ($line % 2 == 1) {
            for ($j = 0; $j < $dimension; $j++, $h++) {
                echo $h . ' ';
            }
            $h += $dimension - 1;
        } else {
            for ($j = $dimension; $j > 0; $j--, $h--) {
                echo $h . ' ';
            }
            $h += $dimension + 1;
        }
        echo PHP_EOL;
    }
}