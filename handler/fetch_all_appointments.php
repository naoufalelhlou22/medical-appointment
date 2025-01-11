<?php

require_once('../functions/fetch_db_tables.php');

$query = "SELECT DISTINCT 
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
    ad.day_session,
    ad.status
FROM 
    patient_info pi
LEFT JOIN 
    medical_info mi ON pi.id = mi.patient_id
LEFT JOIN 
    appointment_details ad ON pi.id = ad.patient_id ";

echo json_encode(['appointments' => fetchTable($query)]);
