<?php
include_once "../includes/db_connector.php";

$patient = stripslashes($_POST['patient']);
$edd = stripslashes($_POST['edd']);

// Check if fields are empty
if (empty($patient)) {
    echo json_encode([
        'status' => 404,
        'message' => "Please specify patient you are recording EDD for."
    ]);
} elseif (empty($edd)) {
    echo json_encode([
        'status' => 404,
        'message' => "No record to add."
    ]);
} else {
    $sql = mysqli_query($conn, "select * from nhmh_patient_db where patient_id = '$patient' ");
    if (mysqli_num_rows($sql) > 0) {
        $sql1 = mysqli_query($conn, "update nhmh_patient_db set edd_date = '$edd' WHERE patient_id= '$patient' ");

        if ($sql1) {
            echo json_encode([
                'status' => 200,
                'message' => "Successfully recorded EDD."
            ]);
        } else {
            echo json_encode([
                'status' => 404,
                'message' => "An error occured"
            ]);
        }
    } else {
        echo json_encode([
            'status' => 404,
            'message' => "Invalid Patient ID."
        ]);
    }
}