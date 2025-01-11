<?php

global $conn;
require_once '../includes/conn_db.php';

$id = $_POST['id'];
$query = "UPDATE appointment_details SET `status` = 'Confirmed' WHERE `patient_id` = {$id}";

if (mysqli_query($conn, $query)) {
    echo "<script>alert('Appointment Id {$id} Confirmed Successfully'); window.location.href = '../app/dashboard/appointments-list.php';</script>";
    exit;
} else {
    echo mysqli_error($conn);
}