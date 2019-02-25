<?php

require_once 'Node.php';

function convertToLinkedList($array)
{
    $list = [];
    $count = count($array);
    for ($i = 0; $i < $count; $i++) {
        array_push($list, new Node());
    }
    for ($i = 0; $i < $count - 1; $i++) {
        $list[$i]->link($array[$i], $list[$i + 1]);
    }
    $list[$count - 1]->link($array[$count - 1], null);
    return $list;
}

function sum($head1, $head2)
{
    $dozen = 0;
    $result = '';
    while (!empty($head1) || !empty($head2)) {
        if (!empty($head1) && !empty($head2)) {
            $current = $head1->value + $head2->value;
        } else {
            empty($head1) ? $current = $head2->value :
                $current = $head1->value;
        }

        if ($dozen != 0) $current += $dozen;

        if ($current >= 10) {
            $dozen = ($current - $current % 10) / 10;
            $current = $current % 10;
        }
        $result = $result . $current;
        if (!empty($head1)) $head1 = $head1->next;
        if (!empty($head2)) $head2 = $head2->next;
    }
    if (!empty($dozen)) $result = $result . $dozen;
    return $result;
}

$list1 = convertToLinkedList([9, 9, 9]);
$list2 = convertToLinkedList([9, 9, 9, 9, 9]);
echo sum($list1[0], $list2[0]);