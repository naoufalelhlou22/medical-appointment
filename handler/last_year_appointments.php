<?php

global $conn;
require_once('../includes/conn-db.php');
require_once('../functions/convert_date_to_months.php');

header('Access-Control-Allow-Origin: *'); // Allow requests from any origin
header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); // Allow specific HTTP methods
header('Access-Control-Allow-Headers: Content-Type, Authorization'); // Allow specific headers
header('Content-Type: application/json'); // Specify the content type

$getYearData = 'SELECT created_quarter FROM appointment_details';
$result = mysqli_query($conn, $getYearData);
$numRows = mysqli_num_rows($result);

function getAppointmentRow($result): void
{
    $quarterOne = 0;
    $quarterTwo = 0;
    $quarterThree = 0;
    $quarterFour = 0;

    while ($quarterCreated = mysqli_fetch_assoc($result)) {
        switch ($quarterCreated['created_quarter']) {
            case 1:
                $quarterOne++;
                break;
            case 2:
                $quarterTwo++;
                break;
            case 3:
                $quarterThree++;
                break;
            case 4:
                $quarterFour++;
                break;
        }
    }
    $totalAppointment = $quarterOne + $quarterTwo + $quarterThree + $quarterFour;
    echo json_encode(['Q1' => $quarterOne, 'Q2' => $quarterTwo, 'Q3' => $quarterThree, 'Q4' => $quarterFour, 'Total appointments last year' => $totalAppointment]);
}

getAppointmentRow($result);

mysqli_free_result($result);
mysqli_close($conn);