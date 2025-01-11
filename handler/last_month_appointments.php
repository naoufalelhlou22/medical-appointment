<?php

global $conn;
require_once('../includes/conn_db.php');
require_once('../functions/convert_date_to_months.php');

header('Access-Control-Allow-Origin: *'); // Allow requests from any origin
header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); // Allow specific HTTP methods
header('Access-Control-Allow-Headers: Content-Type, Authorization'); // Allow specific headers
header('Content-Type: application/json'); // Specify the content type

$getLastMonthData = 'SELECT created_week FROM appointment_details';
$result = mysqli_query($conn, $getLastMonthData);
$numRows = mysqli_num_rows($result);

function getAppointmentRow($result): void
{
    $weekOne = 0;
    $weekTwo = 0;
    $weekThree = 0;
    $weekFour = 0;

    while ($weekCreated = mysqli_fetch_assoc($result)) {
        switch ($weekCreated['created_week']) {
            case 1:
                $weekOne++;
                break;
            case 2:
                $weekTwo++;
                break;
            case 3:
                $weekThree++;
                break;
            case 4:
                $weekFour++;
                break;
        }
    }
    $totalAppointment = $weekOne + $weekTwo + $weekThree + $weekFour;
    echo json_encode(['Week 1' => $weekOne, 'Week 2' => $weekTwo, 'Week 3' => $weekThree, 'Week 4' => $weekFour, 'Total appointments last Month' => $totalAppointment]);
}

getAppointmentRow($result);

mysqli_free_result($result);
mysqli_close($conn);