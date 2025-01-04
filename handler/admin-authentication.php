<?php

global $conn;
require_once('../includes/conn-db.php');
include_once('../functions/showMessage.php');

$query = 'SELECT `username`, `password` FROM doctors';
$fetch = mysqli_query($conn, $query);
$numRows = mysqli_num_rows($fetch);

if ($numRows !== 0) {
    $result = mysqli_fetch_assoc($fetch);
    $doctorUsername = $result['username'];
    $doctorPassword = $result['password'];
    if ($_POST['username'] === $doctorUsername and $_POST['password'] === $doctorPassword){
        header('location: dashboard/analysis.php');
        exit;
    } else {
        echo "<script>alert('Credentials is incorrect'); window.location.href = '../doctors/login.html';</script>";
    }
} else {
    showMessage('false', mysqli_error($conn));
}