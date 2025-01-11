<?php

require_once('../includes/conn_db.php');

function fetchTable($query): array
{
    global $conn;
    $data = [];
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_assoc($result))
        {
            $data[] = $row;
        }

    }
    return $data;
}
