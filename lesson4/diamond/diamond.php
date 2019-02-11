<?php

isset($argv[1]) ? $diagonal = $argv[1] : $diagonal = 11;
if ($diagonal % 2 == 0 || $diagonal < 0) {
    exit('ERROR! You can set a positive odd number as diagonal only. Try it like this:' . PHP_EOL . 'php diamond.php 11');
}
$spaces = $half_diagonal = intval($diagonal / 2);
$asterisks = 1;
for ($i = 0; $i < $half_diagonal; $i++,  $spaces--, $asterisks += 2) {
    echo str_repeat('   ', $spaces) . str_repeat(' * ', $asterisks) . PHP_EOL;
}
for ($i = 0; $i <= $half_diagonal; $i++,  $spaces++, $asterisks -= 2) {
    echo str_repeat('   ', $spaces) . str_repeat(' * ', $asterisks) . PHP_EOL;
}




