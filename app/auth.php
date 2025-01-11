<?php

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header('location: ../../doctors/login.html');
    exit;
}