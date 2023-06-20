<?php

include_once "includes/db_connector.php";

// Build the SQL query
$sql = "SELECT nhmh_patient_db.email AS patient_email, nhmh_patient_db.firstname AS patient_fname, nhmh_staff_db.email AS doctor_email, nhmh_staff_db.firstname AS doctor_fname, nhmh_patient_appointment_db.app_date
        FROM nhmh_patient_appointment_db
        JOIN nhmh_patient_db ON nhmh_patient_appointment_db.patient_id = nhmh_patient_db.patient_id
        JOIN nhmh_staff_db ON nhmh_patient_appointment_db.doctor_uid = nhmh_staff_db.unique_id
        WHERE nhmh_patient_appointment_db.id = 97";

// Execute the query and get the results
$result = mysqli_query($conn, $sql);

// Check for errors
if (!$result) {
    die("Query failed: " . mysqli_error($conn));
}

// Get the patient and doctor email addresses from the query results
$row = mysqli_fetch_assoc($result);
$patient_email = $row['patient_email'];
$patient_fname = $row['patient_fname'];
$doctor_email = $row['doctor_email'];
$doctor_fname = $row['doctor_fname'];
$app_date = date('F j, Y', strtotime($row['app_date']));


// Do something with the patient and doctor email addresses
echo "Patient email: " . $patient_email . "<br>";
echo "Patient fname: " . $patient_fname . "<br>";
echo "Doctor Fname: " . $doctor_fname . "<br>";
echo "Doctor email: " . $doctor_email . "<br>";
echo "Doctor email: " . $app_date;