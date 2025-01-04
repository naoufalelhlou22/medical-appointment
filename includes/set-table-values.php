<?php

function setPatientInfoValues($tableName, array $array): void
{
    global $conn;
    $query = "INSERT INTO `$tableName` (`full_name`, `date_of_birth`, `gender`, `phone`, `email`) 
              VALUES ('{$array['full_name']}', '{$array['date_of_birth']}', '{$array['gender']}', '{$array['phone']}', '{$array['email']}')";
    if (!mysqli_query($conn, $query)) {
        echo json_encode(['success: ' => 'false', 'message: ' => mysqli_error($conn)]);
    } 
    else {
        echo json_encode(['success: ' => 'true', 'message: ' => 'Patient info Data inserted successfully.']) . "<br>";
    }
}

function setMedicalInfoValues($tableName, $medicalInfo): void
{
    global $conn;
    $query = "INSERT INTO `$tableName` (`symptoms`, `medical_reports`, `insurance_info`) 
              VALUES ('{$medicalInfo['symptoms']}', '{$medicalInfo['medical_reports']}', '{$medicalInfo['insurance_info']}')";
    if (!mysqli_query($conn, $query)) {
        echo json_encode(['success: ' => 'false', 'message: ' => mysqli_error($conn)]);
    }
    else {
        echo json_encode(['success: ' => 'true', 'message: ' => 'Medical info data inserted successfully.']) . "<br>";
    }
}

function setAppointmentDetailsValues($tableName, array $array): void
{
    global $conn;
    $currentDay = date('d');
    $currentMonth = date('m');
    $currentTime = date('H');
    $createdWeek = NULL;

    if ($currentDay >= '01' and $currentDay <= '07') {
        $createdWeek = 1;
    } else if ($currentDay >= '08' and $currentDay <= '14') {
        $createdWeek = 2;
    } else if ($currentDay >= '15' and $currentDay <= '21') {
        $createdWeek = 3;
    } else if ($currentDay >= '22' and $currentDay <= '28') {
        $createdWeek = 4;
    }

    $createdQuarter = NULL;

    if ($currentMonth >= '01' and $currentMonth <= '03') {
        $createdQuarter = 1;
    } else if ($currentMonth >= '04' and $currentMonth <= '06') {
        $createdQuarter = 2;
    } else if ($currentMonth >= '07' and $currentMonth <= '09') {
        $createdQuarter = 3;
    } else if ($currentMonth >= '10' and $currentMonth <= '12') {
        $createdQuarter = 4;
    }

    $daySession = NULL;

    if ($currentTime >= '06' and $currentTime <= '12') {
        $daySession = 1;
    } else if ($currentTime >= '12' and $currentTime <= '18') {
        $daySession = 2;
    } else if ($currentTime >= '18' and $currentTime <= '21') {
        $daySession = 3;
    } else if ($currentTime >= '21' and $currentTime <= '06') {
        $daySession = 4;
    }

    $query = "INSERT INTO `$tableName` (`reason_for_visit`, `preferred_date_time`, `doctor`, `created_week`, `created_quarter`, `day_session`) 
              VALUES ('{$array['reason_for_visit']}', '{$array['preferred_date_time']}', '{$array['doctor']}', '$createdWeek', '$createdQuarter', '$daySession')";

    if (!mysqli_query($conn, $query)) {
        echo json_encode(['success: ' => 'false', 'message: ' => mysqli_error($conn)]);
    }
    else {
        echo json_encode(['success: ' => 'true', 'message: ' => 'Appointment details data inserted successfully.']) . "<br>";
    }
}