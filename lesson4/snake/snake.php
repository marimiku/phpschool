<?php
include_once('horizontal_snake.php');
include_once('vertical_snake.php');

isset($argv[1]) ? $dimension = $argv[1] : $dimension = 5;
if ($dimension <= 0 || !is_numeric($dimension)){
    exit('ERROR! You have to set a positive number as a dimension.');
}
isset($argv[2]) ? $direction = $argv[2] : $direction = 'bot';
switch ($direction) {
    case 'right':
        {
            horizontal_snake($dimension);
            break;
        }
    case 'bot':
        {
            vertical_snake($dimension);
            break;
        }
    default:
        {
            exit('ERROR! You have to set \'right\' parameter for horizontal snake or \'bot\' for vertical one.');
        }
}

