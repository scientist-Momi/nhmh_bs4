<?php
include_once "../includes/db_connector.php";
require_once "./Mailer.class.php";


// Getting all inputs from form
$patient_id = stripslashes($_POST['patient_id']);
$doctor_uid = stripslashes($_POST['doctor_uid']);
$date = stripslashes($_POST['appdate']);
$whobooked = stripslashes($_POST['whobooked']);
$purpose = stripslashes($_POST['purpose']);

//  Check if fields are empty
if (empty($patient_id)) {
    echo json_encode([
        'status' => 401,
        'message' => "Please input Patient ID."
    ]);
} elseif (empty($doctor_uid)) {
    echo json_encode([
        'status' => 401,
        'message' => "Can not get Doctor's details."
    ]);
} elseif (empty($date)) {
    echo json_encode([
        'status' => 401,
        'message' => "Add date of appointment."
    ]);
} elseif (!isset($_POST['app_time'])) {
    echo json_encode([
        'status' => 401,
        'message' => "Add time of appointment."
    ]);
} elseif (empty($purpose)) {
    echo json_encode([
        'status' => 401,
        'message' => "Add Purpose of appointment."
    ]);
} else {
    $apptime = $_POST['app_time'];
    // check if patient id is valid or exists
    $sql = mysqli_query($conn, "select * from nhmh_patient_db where patient_id = '$patient_id' ");
    if (mysqli_num_rows($sql) > 0) {
        $sqlarray = mysqli_fetch_assoc($sql);
        $email = $sqlarray["email"];
        $firstname = $sqlarray["firstname"];

        //check if the date is valid
        $today = date("Y-m-d");
        if ($date > $today) {
            //get the day of the week picked
            $today = strtotime($date);
            $day = date('l', $today);
            $month = date('F', $today);
            // echo "$day";
            //check if the days are not weekends
            $not_allowed_days = ['Sunday', 'Saturday'];
            if (in_array($day, $not_allowed_days)) {
                echo json_encode([
                    'status' => 401,
                    'message' => "NHMH does not take appointments for weekends.."
                ]);
            } else {
                // get doctor info

                $sql1 = mysqli_query($conn, "select * from nhmh_staff_db where unique_id = '$doctor_uid'");

                $sql1_array = mysqli_fetch_assoc($sql1);
                $doctor = $sql1_array["firstname"];

                // check if Appointment is available
                $sql2 = mysqli_query($conn, "select * from nhmh_patient_appointment_db where app_date = '$date' and app_time = '$apptime' and doctor_to_see = '$doctor'  ");

                if (mysqli_num_rows($sql2) > 0) {

                    echo json_encode([
                        'status' => 401,
                        'message' => "Appointment date and time you have choosen is unavailable, or you already booked an appointment for $day $date ."
                    ]);
                } else {
                    // insert data into appointment database
                    $sql3 = mysqli_query($conn, "insert into nhmh_patient_appointment_db(patient_id,app_date,app_time,doctor_to_see,doctor_uid,purpose,month,who_booked) values('$patient_id', '$date', '$apptime', '$doctor','$doctor_uid', '$purpose', '$month', '$whobooked')");

                    $sql4 = mysqli_query($conn, "select email,firstname from nhmh_patient_db where patient_id = {$patient_id}");
                    $row = mysqli_fetch_assoc($sql4);

                    if ($sql3) {
                       
                        $emailSender = new EmailSender();
                        $emailSender->newAppointment($row['email'], $row['firstname'], $doctor, $date, $apptime);
                        echo json_encode([
                            'status' => 200,
                            'message' => "Booking was successfull."
                        ]);
                    } else {
                        echo json_encode([
                            'status' => 401,
                            'message' => "Booking was not successful."
                        ]);
                    }
                }
            }
        } else {
            echo json_encode([
                'status' => 401,
                'message' => "Invalid Date Entered."
            ]);
        }
    } else {
        echo json_encode([
            'status' => 401,
            'message' => "Patient not found."
        ]);
    }
}