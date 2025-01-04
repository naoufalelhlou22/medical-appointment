<?php

global $conn;
require_once('../includes/conn-db.php');
require('../includes/set-table-values.php');

$inputData = file_get_contents('php://input');

$data = json_decode($inputData, 1);

if ($data === NULL) {
    echo json_encode(['success: ' => 'false', 'message: ', 'INVALID JSON DATA']) . "<br>";
    exit;
} else {
  echo json_encode(['success: ' => 'true', 'message: ' => 'Appointment successfully booked.']);
}

$patientInfo = $data['patient_info'];
$medicalInfo = $data['medical_info'];
$appointmentDetails = $data['appointment_details'];

setPatientInfoValues('patient_info', $patientInfo);
setMedicalInfoValues('medical_info', $medicalInfo);
setAppointmentDetailsValues('appointment_details', $appointmentDetails);