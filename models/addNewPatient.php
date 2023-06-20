<?php

include_once "../includes/db_connector.php";
require_once "./Mailer.class.php";

// Getting all inputs from form
$fname = stripslashes($_POST['fname']);
$lname = stripslashes($_POST['lname']);
$email = stripslashes($_POST['email']);
$phone = stripslashes($_POST['phone']);
$address = stripslashes($_POST['address']);
$dob = stripslashes($_POST['dob']);
$genotype = stripslashes($_POST['genotype']);
$bgroup = stripslashes($_POST['bgroup']);
$height = stripslashes($_POST['height']);
$children = stripslashes($_POST['children']);
$nokname = stripslashes($_POST['nokname']);
$nokrel = stripslashes($_POST['nokrel']);
$nokphone = stripslashes($_POST['nokphone']);
$nokaddress = stripslashes($_POST['nokaddress']);
$nurse_id = stripslashes($_POST['nurse_id']);
$regCode = stripslashes($_POST['regCode']);


//Generate random password for staff
$data = 'NHMHPATIENT1234567890nhmhpatient!@#$%&';

$password = substr(str_shuffle($data), 0, 10);

// Generate first username for staff
$rand_user = rand(time(), 100000);
$fix = "PAT";
$username = $fix . $rand_user;

$rand_id = rand(time(), 100000000);
$status = "Offline now";

// calculate age from dob
$today = date("y-m-d");
$age = date_diff(date_create($dob), date_create($today))->y;

//insert inputs into database
$sql = mysqli_query($conn, "insert into nhmh_patient_db (unique_id,firstname,lastname,email,phone,address,age,genotype,bgroup,height,children,nokname,nokrel,nokphone,nokaddress,username,password,status,nurse_in_charge) values('$rand_id', '$fname', '$lname', '$email', '$phone', '$address', '$age', '$genotype', '$bgroup', '$height', '$children', '$nokname', '$nokrel', '$nokphone', '$nokaddress', '$username', '$password', '$status', '$nurse_id') ");

if ($sql) {
    $sql1 = mysqli_query($conn, "delete from nhmh_regcodes_db where code = '$regCode'");

    $sql2 = mysqli_query($conn, "select patient_id from nhmh_patient_db where unique_id = '$rand_id' ");
    $sql2array = mysqli_fetch_assoc($sql2);
    $patient_id = $sql2array['patient_id'];
    if($sql1){
        $emailSender = new EmailSender();
        $emailSender->sendEmailTwo($email, $fname, $username, $password, 'Patient', 'newPatient', $patient_id);
        echo json_encode([
            'status' => 200,
            'message' => 'Successfully added Patient.'
        ]);
    }else{
        echo json_encode([
            'status' => 401,
            'message' => 'Could not clear registration code.'
        ]);
    }

} else {
    echo json_encode([
        'status' => 401,
        'message' => 'Something went wrong'
    ]);
}
