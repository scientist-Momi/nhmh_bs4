<?php

include_once "../includes/db_connector.php";

// Getting all inputs from form
$pid = stripslashes($_POST['pid']);
$temp = stripslashes($_POST['temp']);
$pulse = stripslashes($_POST['pulse']);
$bpressure = stripslashes($_POST['bpressure']);
$weight = stripslashes($_POST['weight']);

// Check if fields are empty
if (empty($pid)) {
    echo json_encode([
        'status' => 401,
        'message' => "Input patient ID."
    ]);
} elseif (empty($temp)) {
    echo json_encode([
        'status' => 401,
        'message' => "Input patient Body Temperature."
    ]);
} elseif (empty($bpressure)) {
    echo json_encode([
        'status' => 401,
        'message' => "Input patient Blood Pressure."
    ]);
} elseif (empty($pulse)) {
    echo json_encode([
        'status' => 401,
        'message' => "Input patient Pulse rate."
    ]);
} elseif (empty($weight)) {
    echo json_encode([
        'status' => 401,
        'message' => "Input patient weight."
    ]);
} else {
    // check if patient ID is a valid one
    $sql1 = mysqli_query($conn, "select * from nhmh_patient_db where patient_id = '$pid' ");

    if (mysqli_num_rows($sql1) > 0) {
        $details = mysqli_fetch_assoc($sql1);

        $fname = $details['firstname'];
        $lname = $details['lastname'];

        $date = date("Y-m-d");

        $sql2 = mysqli_query($conn, "insert into nhmh_patient_vital_db(patient_id,firstname,lastname,temperature,weight,pulse,blood_pressure,date) values ('$pid', '$fname', '$lname', '$temp', '$weight', '$pulse', '$bpressure', '$date') ");

        if ($sql2) {
            echo json_encode([
                'status' => 200,
                'message' => "Vitals Added Successfully."
            ]);
        } else {
            echo json_encode([
                'status' => 401,
                'message' => "Could not update data: " . mysqli_error($conn)
            ]);
        }
    } else {
        echo json_encode([
            'status' => 401,
            'message' => "Invalid Patient ID."
        ]);
    }
}
