<?php

require_once('../functions/fetch_db_tables.php');
header('Content-Type: application/json');

$id = $_GET['id'];
$query = "SELECT 
    pi.*,
    mi.symptoms,
    mi.medical_reports,
    mi.insurance_info,
    ad.reason_for_visit,
    ad.preferred_date_time,
    ad.doctor,
    ad.created_at AS appointment_created_at,
    ad.created_week,
    ad.created_quarter,
    ad.day_session
FROM 
    patient_info pi
LEFT JOIN 
    medical_info mi ON pi.id = mi.patient_id
LEFT JOIN 
    appointment_details ad ON pi.id = ad.patient_id
WHERE 
    pi.id = $id";

$info = fetchTable($query);
echo json_encode(['appointments' => $info]);