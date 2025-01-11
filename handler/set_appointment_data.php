<?php

global $conn, $patientInfo, $medicalInfo, $appointmentDetails;
require_once('../includes/conn_db.php');
require('../includes/set_table_values.php');

$inputData = file_get_contents('php://input');

$data = json_decode($inputData, 1);

if ($data === NULL) {
    echo json_encode(['success: ' => 'false', 'message: ', 'INVALID JSON DATA']) . "<br>";
    exit;
} else {
  echo json_encode(['success: ' => 'true', 'message: ' => 'Appointment successfully booked.']) . "<br>";
}

$patientInfo = $data['patient_info'];
$medicalInfo = $data['medical_info'];
$appointmentDetails = $data['appointment_details'];

setPatientInfoValues('patient_info', $patientInfo);
setMedicalInfoValues('medical_info', $medicalInfo, $patientInfo['email']);
setAppointmentDetailsValues('appointment_details', $appointmentDetails, $patientInfo['email']);