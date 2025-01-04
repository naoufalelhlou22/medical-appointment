<?php

global $conn;
require_once('../includes/conn-db.php');
require_once('../functions/convert_date_to_months.php');

header('Access-Control-Allow-Origin: *'); // Allow requests from any origin
header('Access-Control-Allow-Methods: GET, POST, OPTIONS'); // Allow specific HTTP methods
header('Access-Control-Allow-Headers: Content-Type, Authorization'); // Allow specific headers
header('Content-Type: application/json'); // Specify the content type

$query = 'SELECT created_at FROM patient_info WHERE id >= 1';
$result = mysqli_query($conn, $query);
$numRows = mysqli_num_rows($result);
$createdAt = [];

if ($numRows > 0) {
    function getCreatedAtRow($result) : void
    {
        $active = 0;
        $inActive = 0;

        while ($row = mysqli_fetch_assoc($result))
        {
            if (convertDateToMonth($row) <= 12.5) {
                $active++;
            } else if(convertDateToMonth($row) > 12) {
                $inActive++;
            }
        }
        echo json_encode(['Active patients' => $active, 'In active patients' => $inActive]);
    }
    getCreatedAtRow($result);
}

mysqli_free_result($result);
mysqli_close($conn);