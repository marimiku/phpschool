<?php
include_once "ParsedAuto.php";

function parseDB($path)
{
    $autoArray = [];
    $handle = @fopen($path, "r");
    if ($handle) {
        while (($buffer = fgets($handle, 4096)) !== false) {
            array_push($autoArray, explodeNext($buffer));
        }
        if (!feof($handle)) {
            echo "Error: unable to read a string from file.\n";
        }
        fclose($handle);
    }
    return $autoArray;
}

function explodeNext($buffer)
{
    list ($brand, $model, $since, $to) = explode(';', $buffer);
    return new ParsedAuto($brand, $model, $since, $to);
}