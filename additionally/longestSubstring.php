<?php

$arr = str_split('abcabcab');
$longest = 0;
$st = '';
$strArr = [];

for ($i = 0; $i < count($arr) - 1; $i++) {
    $st = $st . $arr[$i];
    $j = $i + 1;
    while (!empty($arr[$j]) && !empty($arr[$j + 1]) && $arr[$j] != $st[0] && ($arr[$j] != $arr[$j + 1]) && $j < count($arr) - 1)
        $st = $st . $arr[$j++];
    if ($arr[$j] != $st[0])
        $st = $st . $arr[$j];
    if (!in_array($st, $strArr) && strlen($st) >= $longest)
        (strlen($st) > $longest) ? $strArr = [$st] : array_push($strArr, $st);
    $longest = strlen($st);
    $st = '';
}
print_r($strArr);

