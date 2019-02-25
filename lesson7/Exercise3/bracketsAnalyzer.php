<?php

require_once __DIR__ . '\Stack.php';

function F($string)
{
    $openingBrackets = ['[', '<', '{', '('];
    $closingBrackets = [']', '>', '}', ')'];
    $stack = new Stack();

    //transform string to array of characters
    $stringArray = str_split($string);


    try {
        foreach ($stringArray as $char) {
            //if there is opening bracket in array, push it into stack
            if (in_array($char, $openingBrackets)) {
                $stack->push($char);
            //if there is closing bracket in array, check if previous bracket matches
            } elseif (in_array($char, $closingBrackets)) {
                $key = array_search($char, $closingBrackets);
             //if not, string has a mistake
                if ($stack->pop() != $openingBrackets[$key]) {
                    return false;
                }
            }
        }
       //if there are more opening brackets than closing ones, string is incorrect, else it's correct
       return $stack->isEmpty() ? true : false;
    //also if there are more closing brackets than opening ones, string is incorrect
    } catch (RuntimeException $e) {
        return false;
    }
}

echo F('(<{}') ? 'This brackets sequence is correct.' : 'This brackets sequence is INcorrect.';