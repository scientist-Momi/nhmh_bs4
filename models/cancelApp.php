<?php
include_once "../includes/db_connector.php";
// require_once 'Mailer.class.php';

$delete_id = stripslashes($_GET['app_id']);

$sql2 = mysqli_query($conn, 
        "SELECT nhmh_patient_db.email AS patient_email,nhmh_patient_db.firstname AS patient_fname, nhmh_staff_db.email AS doctor_email, nhmh_staff_db.firstname AS doctor_fname, nhmh_patient_appointment_db.app_date, nhmh_patient_appointment_db.patient_id
        FROM nhmh_patient_appointment_db
        JOIN nhmh_patient_db ON nhmh_patient_appointment_db.patient_id = nhmh_patient_db.patient_id
        JOIN nhmh_staff_db ON nhmh_patient_appointment_db.doctor_uid = nhmh_staff_db.unique_id
        WHERE nhmh_patient_appointment_db.id = {$delete_id} ");

// echo "$delete_id";
$sql = mysqli_query($conn, "delete from nhmh_patient_appointment_db where id = '$delete_id' ");

if ($sql) {
    $row = mysqli_fetch_assoc($sql2);
    $patient_email = $row['patient_email'];
    $patient_fname = $row['patient_fname'];
    $doctor_email = $row['doctor_email'];
    $doctor_fname = $row['doctor_fname'];
    $patient_id = $row['patient_id'];
    $app_date = date('F j, Y', strtotime($row['app_date']));

    // $emailSender->cancelAppointmentTwo($doctor_email, $doctor_fname, $patient_id, $app_date);

    echo  json_encode([
        'msg' => "successfull"
    ]);
}
