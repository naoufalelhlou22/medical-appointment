<?php

function convertDateToMonth($createdAt): float
{
    global $yearCreatedAt, $monthCreatedAt, $dayCreatedAt;
    $currentDate = explode('-', date('Y-m-d'));
    $currentDateYear = (int) $currentDate[0] * 3.154e+7;
    $currentDateMonth = (int) $currentDate[1] * 2.628e+6;
    $currentDateDay = (int) $currentDate[2] * 86400;
    $TotalSeconds = 0;

    foreach ($createdAt as $value) {
        global $yearCreatedAt;
        $dateCreatedAt = explode('-', $value);
        $yearCreatedAt = (int) $dateCreatedAt[0] * 3.154e+7;
        $monthCreatedAt = (int) $dateCreatedAt[1] * 2.628e+6;
        $dayCreatedAt = (int) $dateCreatedAt[2] * 86400;
    }

    $TotalSeconds += ($currentDateYear - $yearCreatedAt) + ($currentDateMonth - $monthCreatedAt) + ( $currentDateDay - $dayCreatedAt);
    return $TotalSeconds / 2.628e+6;
}