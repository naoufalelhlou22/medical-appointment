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
    $query = "INSERT INTO `$tableName` (`reason_for_visit`, `preferred_date_time`, `doctor`) 
              VALUES ('{$array['reason_for_visit']}', '{$array['preferred_date_time']}', '{$array['doctor']}')";
    if (!mysqli_query($conn, $query)) {
        echo json_encode(['success: ' => 'false', 'message: ' => mysqli_error($conn)]);
    }
    else {
        echo json_encode(['success: ' => 'true', 'message: ' => 'Appointment details data inserted successfully.']) . "<br>";
    }
}