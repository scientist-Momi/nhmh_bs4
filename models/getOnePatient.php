<?php
include_once "../includes/db_connector.php";


// To check if any of the field is empty
if (empty($_POST['patient_id'])) {
    echo json_encode([
        'status' => 401,
        'message' => 'Patient ID not specified.'
    ]);
} else {
    $patient_id = htmlspecialchars(strip_tags($_POST['patient_id']));

    $sql1 = mysqli_query($conn, "select * from nhmh_patient_db where patient_id = '$patient_id' ");
    $sql1_array = mysqli_fetch_assoc($sql1);

    if (mysqli_num_rows($sql1) > 0) {
        $pid = $sql1_array['patient_id'];
        $sql2 = mysqli_query($conn, "select * from nhmh_patient_vital_db where patient_id = '$pid' order by id desc limit 0, 1 ");
        if (mysqli_num_rows($sql2) > 0) {
            $sql2_array = mysqli_fetch_assoc($sql2);

            echo json_encode([
                'status' => 200,
                'patient_id' => $sql1_array['patient_id'],
                'unique_id' => $sql1_array['unique_id'],
                'firstname' => $sql1_array['firstname'],
                'lastname' => $sql1_array['lastname'],
                'email' => $sql1_array['email'],
                'phone' => $sql1_array['phone'],
                'address' => $sql1_array['address'],
                'age' => $sql1_array['age'],
                'photo' => $sql1_array['photo'],
                'active_status' => $sql1_array['status'],
                'created_at' => $sql1_array['created_at'],
                'genotype' => $sql1_array['genotype'],
                'bgroup' => $sql1_array['bgroup'],
                'height' => $sql1_array['height'],
                'children' => $sql1_array['children'],
                'edd_date' => $sql1_array['edd_date'],
                'nokrel' => $sql1_array['nokrel'],
                'nokphone' => $sql1_array['nokphone'],
                'nokname' => $sql1_array['nokname'],
                'nokaddress' => $sql1_array['nokaddress'],
                'regBy' => $sql1_array['nurse_in_charge'],
                'temperature' => $sql2_array['temperature'],
                'weight' => $sql2_array['weight'],
                'pulse' => $sql2_array['pulse'],
                'blood_pressure' => $sql2_array['blood_pressure']

            ]);
        } else {
            $sql2_array = mysqli_fetch_assoc($sql2);

            echo json_encode([
                'status' => 200,
                'patient_id' => $sql1_array['patient_id'],
                'unique_id' => $sql1_array['unique_id'],
                'firstname' => $sql1_array['firstname'],
                'lastname' => $sql1_array['lastname'],
                'email' => $sql1_array['email'],
                'phone' => $sql1_array['phone'],
                'address' => $sql1_array['address'],
                'age' => $sql1_array['age'],
                'photo' => $sql1_array['photo'],
                'active_status' => $sql1_array['status'],
                'created_at' => $sql1_array['created_at'],
                'genotype' => $sql1_array['genotype'],
                'bgroup' => $sql1_array['bgroup'],
                'height' => $sql1_array['height'],
                'children' => $sql1_array['children'],
                'edd_date' => $sql1_array['edd_date'],
                'nokrel' => $sql1_array['nokrel'],
                'nokphone' => $sql1_array['nokphone'],
                'nokname' => $sql1_array['nokname'],
                'nokaddress' => $sql1_array['nokaddress'],
                'regBy' => $sql1_array['nurse_in_charge'],
                'temperature' => "No data",
                'weight' => "No data",
                'pulse' => "No data",
                'blood_pressure' => "No data"

            ]);
        }
    } else {
        echo json_encode([
            'status' => 401,
            'message' => 'No record found.'
        ]);
    }
}