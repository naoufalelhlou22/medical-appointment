<?php

function showMessage ($status, $message) {
    if ($status === 'true') {
        $msg = json_encode(['success: ' => $status, 'message: ' => $message]);
        echo "<script>console.log('$msg')</script>";
    } else if ($status === 'false') {
        $msg = json_encode(['success: ' => $status, 'message: ' => $message]);
        echo "<script>console.log('$msg')</script>";
    }
}