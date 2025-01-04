<?php

include_once ('../functions/showMessage.php');

$host = '127.0.0.1';
$uname = 'root';
$pass = '';
$db = 'medical_appointment';
$conn = mysqli_connect($host, $uname, $pass, $db);

if (!$conn) {
    showMessage('false', mysqli_connect_error($conn));
} /*else {
    showMessage('true', 'Db connect successful.');
}*/
