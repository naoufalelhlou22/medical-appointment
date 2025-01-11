<?php

// Global database connection variable
global $conn;

/**
 * Inserts patient information into the specified table.
 *
 * @param string $tableName The name of the table where patient data will be inserted.
 * @param array $array Associative array containing patient details: full_name, date_of_birth, gender, phone, email.
 */
function setPatientInfoValues($tableName, array $array): void
{
    global $conn;

    // Prepare the SQL query to insert patient information
    $query = "INSERT INTO `$tableName` (`full_name`, `date_of_birth`, `gender`, `phone`, `email`) 
              VALUES ('{$array['full_name']}', '{$array['date_of_birth']}', '{$array['gender']}', '{$array['phone']}', '{$array['email']}')";

    // Execute the query and handle errors
    if (!mysqli_query($conn, $query)) {
        echo json_encode(['success' => 'false', 'message' => mysqli_error($conn)]);
    } else {
        echo json_encode(['success' => 'true', 'message' => 'Patient info data inserted successfully.']) . "<br>";
    }
}

/**
 * Inserts medical information into the specified table, linked dynamically to a patient by their identifier.
 *
 * @param string $tableName The name of the table where medical info will be inserted.
 * @param array $medicalInfo Associative array containing medical details: symptoms, medical_reports, insurance_info.
 * @param string $patientIdentifier Unique identifier for the patient (e.g., email).
 */
function setMedicalInfoValues($tableName, $medicalInfo, $patientIdentifier): void
{
    global $conn;

    // Fetch the patient ID from the patient_info table using the patient identifier
    $result = mysqli_query($conn, "SELECT `id` FROM patient_info WHERE `email` = '{$patientIdentifier}'");
    $patientId = mysqli_fetch_assoc($result);

    if ($result && $patientId) {
        // Prepare the SQL query to insert medical information
        $query = "INSERT INTO `$tableName` (`patient_id`, `symptoms`, `medical_reports`, `insurance_info`) 
                  VALUES ('{$patientId['id']}', '{$medicalInfo['symptoms']}', '{$medicalInfo['medical_reports']}', '{$medicalInfo['insurance_info']}')";

        // Execute the query and handle errors
        if (!mysqli_query($conn, $query)) {
            echo json_encode(['success' => 'false', 'message' => mysqli_error($conn)]);
        } else {
            echo json_encode(['success' => 'true', 'message' => 'Medical info data inserted successfully.']) . "<br>";
        }
    } else {
        // Handle case where no matching patient is found
        echo json_encode(['success' => 'false', 'message' => 'No matching patient found for the provided identifier.']);
    }
}

/**
 * Inserts appointment details into the specified table, dynamically linked to a patient by their identifier.
 *
 * @param string $tableName The name of the table where appointment details will be inserted.
 * @param array $array Associative array containing appointment details: reason_for_visit, preferred_date_time, doctor.
 * @param string $patientIdentifier Unique identifier for the patient (e.g., email).
 */
function setAppointmentDetailsValues($tableName, array $array, $patientIdentifier): void
{
    global $conn;

    // Calculate week of the month
    $currentDay = date('d');
    $createdWeek = ceil($currentDay / 7);

    // Calculate quarter of the year
    $currentMonth = date('m');
    $createdQuarter = ceil($currentMonth / 3);

    // Determine session of the day
    $currentTime = date('H');
    $daySession = match (true) {
        $currentTime >= 6 && $currentTime < 12 => 1, // Morning
        $currentTime >= 12 && $currentTime < 18 => 2, // Afternoon
        $currentTime >= 18 && $currentTime < 21 => 3, // Evening
        default => 4, // Night
    };

    // Fetch the patient ID from the patient_info table using the patient identifier
    $result = mysqli_query($conn, "SELECT `id` FROM patient_info WHERE `email` = '{$patientIdentifier}'");
    $patientId = mysqli_fetch_assoc($result);

    if ($result && $patientId) {
        // Prepare the SQL query to insert appointment details
        $query = "INSERT INTO `$tableName` (`patient_id`, `reason_for_visit`, `preferred_date_time`, `doctor`, `created_week`, `created_quarter`, `day_session`) 
                  VALUES ('{$patientId['id']}', '{$array['reason_for_visit']}', '{$array['preferred_date_time']}', '{$array['doctor']}', '$createdWeek', '$createdQuarter', '$daySession')";

        // Execute the query and handle errors
        if (!mysqli_query($conn, $query)) {
            echo json_encode(['success' => 'false', 'message' => mysqli_error($conn)]);
        } else {
            echo json_encode(['success' => 'true', 'message' => 'Appointment details data inserted successfully.']) . "<br>";
        }
    } else {
        // Handle case where no matching patient is found
        echo json_encode(['success' => 'false', 'message' => 'No matching patient found for the provided identifier.']);
    }
}
