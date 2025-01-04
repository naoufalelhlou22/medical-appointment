<?php

$months = [
    1 => 'Jan',
    2 => 'Feb',
    3 => 'Mar',
    4 => 'Apr',
    5 => 'May',
    6 => 'Jun',
    7 => 'Jul',
    8 => 'Aug',
    9 => 'Sep',
    10 => 'Oct',
    11 => 'Nov',
    12 => 'Dec'
];

$month = date('M');
$f = strtotime("First day of $month");
$l = strtotime("Last day of $month");
$w = 0;

switch ($f) {
    case 7:
    case 14:
    case 21:
    case 28:
    $w++;
        break;

}