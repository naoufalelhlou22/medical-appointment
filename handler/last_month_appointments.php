<?php

global $conn;
require_once('../includes/conn-db.php');
require_once('../functions/convert_date_to_months.php');

header('Access-Control-Allow-Origin: *'); // Allow requests from any origin
header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); // Allow specific HTTP methods
header('Access-Control-Allow-Headers: Content-Type, Authorization'); // Allow specific headers
header('Content-Type: application/json'); // Specify the content type

$getLastMonthData = 'SELECT created_at FROM appointment_details WHERE created_at >= CURDATE() - INTERVAL 1 MONTH;';
$result = mysqli_query($conn, $getLastMonthData);
$numRows = mysqli_num_rows($result);

function getAppointmentRow($result): void
{
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

    $appointments = 0;
    $weeks = 0;
    while ($lastMonthRow = mysqli_fetch_assoc($result)) {
        $date = implode('-',$lastMonthRow);
        $date = explode('-', $date);
        $month = (int) $date[1];

        $f = strtotime("First day of $months[$month]");
        $l = strtotime("Last day of $months[$month]");

        $weeks = (($l - $f) / 86400) / 7;
        $appointments++;

    }
        
    echo json_encode(['Week 1' => 200, 'Week 2' => 300, 'Week 3' => 150, 'Week 4' => 290, 'Total appointments last Month' => $appointments]);
}

getAppointmentRow($result);

mysqli_free_result($result);
mysqli_close($conn);