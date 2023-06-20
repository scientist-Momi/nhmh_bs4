<?php
include_once "../includes/db_connector.php";

$patient_id = stripslashes($_POST['patient_id']);
$diagnosis = stripslashes($_POST['diagnosis']);
$staff_uid = stripslashes($_POST['staff_uid']);
$prescription = stripslashes($_POST['prescription']);

//  Check if fields are empty
if (empty($patient_id)) {
    echo json_encode([
        'status' => 401,
        'message' => "Please input Patient ID."
    ]);
} elseif (empty($diagnosis)) {
    echo json_encode([
        'status' => 401,
        'message' => "Add patient diagnosis."
    ]);
} elseif (empty($prescription)) {
    echo json_encode([
        'status' => 401,
        'message' => "Add prescription for patient."
    ]);
} else {
    // check if patient id is valid or exists
    $sql = mysqli_query($conn, "select * from nhmh_patient_db where patient_id = '$patient_id' ");

    if (mysqli_num_rows($sql) > 0) {
        // get doctor info
        // $user_id = stripslashes($_SESSION['staff_uid']);

        $sql1 = mysqli_query($conn, "select * from nhmh_staff_db where unique_id = '$staff_uid'");
        if ($sql1) {
            $sql1_array = mysqli_fetch_assoc($sql1);
            $doctor = $sql1_array["firstname"];

            $unique_id = rand(time(), 100000);
            $today = date("Y-m-d");
            // File upload configuration 
            $targetDir = "../images/medrec_images/";

            $allowTypes = array('jpg', 'png', 'jpeg', 'gif');

            $fileNames = array_filter($_FILES['files']['name']);

            if (!empty($fileNames)) {
                // $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = '';

                $insertValuesSQL = "";
                foreach ($_FILES['files']['name'] as $key => $val) {
                    $fileName = basename($_FILES['files']['name'][$key]);
                    $targetFilePath = $targetDir . $fileName;

                    // Check whether file type is valid 
                    $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);
                    if (in_array($fileType, $allowTypes)) {
                        // Upload file to server 
                        if (move_uploaded_file($_FILES["files"]["tmp_name"][$key], $targetFilePath)) {
                            // Image db insert sql 
                            $insertValuesSQL .= "('" . $unique_id . "', '" . $fileName . "', '" . $today . "' ),";
                        } else {
                            echo json_encode([
                                'status' => 401,
                                'message' => "Error uploading file"
                            ]);
                        }
                    } else {
                        echo json_encode([
                            'status' => 401,
                            'message' => "File type not supported"
                        ]);
                    }
                }
                if (!empty($insertValuesSQL)) {
                    $insertValuesSQL = trim($insertValuesSQL, ',');
                    addData($conn, $unique_id, $patient_id, $diagnosis, $prescription, $doctor, $today);
                    addPhoto($conn, $unique_id, $fileName, $today);
                    // Insert image file name into database 
                    // $insert = $conn->query("INSERT INTO nhmh_record_images_db (unique_id, file_name, date) VALUES $insertValuesSQL");
                    // $insert = $conn->query("INSERT INTO nhmh_record_images_db (unique_id, file_name, date) VALUES ('$unique_id', '$fileName', '$today')");
                    // if (!$insert) {
                    //     echo json_encode([
                    //         'status' => 401,
                    //         'message' => "Error uploading files"
                    //     ]);
                    // }
                } else {
                    echo json_encode([
                        'status' => 401,
                        'message' => "Something went wrong with file upload."
                    ]);
                }
            } else {

                // // insert into database
                // $sql2 = mysqli_query($conn, "insert into nhmh_patient_medical_record_db(unique_id,patient_id,diagnosis,instruction,attending_doctor,date) values('$unique_id', '$patient_id', '$diagnosis', '$prescription', '$doctor', '$today')");

                // if ($sql2) {
                //     echo json_encode([
                //         'status' => 200,
                //         'message' => "Successfully added record for patient ".$patient_id
                //     ]);
                // } else {
                //     echo json_encode([
                //         'status' => 401,
                //         'message' => "An error occurred"
                //     ]);
                // }
                addData($conn, $unique_id, $patient_id, $diagnosis, $prescription, $doctor, $today);
            }
        } else {
            echo json_encode([
                'status' => 401,
                'message' => "Could not retrieve Doctor's info."
            ]);
        }
    } else {
        echo json_encode([
            'status' => 401,
            'message' => "Invalid Patient ID"
        ]);
    }
}


function addData($conn, $unique_id, $patient_id, $diagnosis, $prescription, $doctor, $today)
{
    // insert into database
    $sql2 = mysqli_query($conn, "insert into nhmh_patient_medical_record_db(unique_id,patient_id,diagnosis,instruction,attending_doctor,date) values('$unique_id', '$patient_id', '$diagnosis', '$prescription', '$doctor', '$today')");

    if ($sql2) {
        echo json_encode([
            'status' => 200,
            'message' => "Successfully added record for patient " . $patient_id
        ]);
    } else {
        echo json_encode([
            'status' => 401,
            'message' => "An error occurred"
        ]);
    }
}

function addPhoto($conn, $unique_id, $fileName, $today)
{
    $insert = $conn->query("INSERT INTO nhmh_record_images_db (unique_id, file_name, date) VALUES ('$unique_id', '$fileName', '$today')");
    if (!$insert) {
        echo json_encode([
            'status' => 401,
            'message' => "Error uploading files"
        ]);
    }
}