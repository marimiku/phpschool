<?php

function vertical_snake($dimension)
{
    for ($i = 0; $i < $dimension; $i++) {
        for ($h = 0; $h < $dimension; $h++) {
            ($h % 2 == 0) ? $k = $dimension * $h + ($i + 1) : $k = $dimension * ($h + 1) - $i;
            echo $k . ' ';
        }
        echo PHP_EOL;
    }
}
