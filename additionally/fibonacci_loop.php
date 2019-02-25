<?php

function fibonacci($number)
{
    $fib1 = $fib2 = 1;
    for ($i = 2; $i < $number; $i++) {
        $temp = $fib1;
        $fib1 = $fib2;
        $fib2 += $temp;
    }
    return $fib2;
}

function fibonacci2($number)
{
    if ($number === 0) return 0;
    return ($number > 0) ? fibonacci($number) : -fibonacci(-$number);
}

echo fibonacci2(6);