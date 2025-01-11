<?php

global $conn;
require_once('../includes/conn_db.php');
require_once('../functions/convert_date_to_months.php');

header('Access-Control-Allow-Origin: *'); // Allow requests from any origin
header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); // Allow specific HTTP methods
header('Access-Control-Allow-Headers: Content-Type, Authorization'); // Allow specific headers
header('Content-Type: application/json'); // Specify the content type

$getDaySessionData = 'SELECT day_session FROM appointment_details';
$result = mysqli_query($conn, $getDaySessionData);
$numRows = mysqli_num_rows($result);

function getAppointmentRow($result): void
{
    $morning = 0;
    $afternoon = 0;
    $evening = 0;
    $night = 0;
    while ($daySession = mysqli_fetch_assoc($result)) {
        switch ($daySession['day_session']) {
            case 1:
                $morning++;
                break;
            case 2:
                $afternoon++;
                break;
            case 3:
                $evening++;
                break;
            case 4:
                $night++;
                break;
        }
    }
    $totalAppointment = $morning + $afternoon + $evening + $night;
    echo json_encode(['Morning' => $morning, 'Afternoon' => $afternoon, 'Evening' => $evening, 'Night' => $night, 'Total appointments today' => $totalAppointment]);
}

getAppointmentRow($result);

mysqli_free_result($result);
mysqli_close($conn);