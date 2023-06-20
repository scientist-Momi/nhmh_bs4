<?php
include_once "../includes/db_connector.php";
require_once "./Mailer.class.php";

$position = htmlspecialchars(strip_tags($_POST['position']));
$firstname  = htmlspecialchars(strip_tags($_POST['firstname']));
$lastname = htmlspecialchars(strip_tags($_POST['lastname']));
$email = htmlspecialchars(strip_tags($_POST['email']));
$phone = htmlspecialchars(strip_tags($_POST['phone']));
// $gender = isset($_POST['gender']) ? $_POST['gender'] : '';
$address = htmlspecialchars(strip_tags($_POST['address']));

//  Check if fields are empty
if (empty($firstname)) {
    echo "First Name field cannot be empty.";
    
} elseif (empty($lastname)) {
    echo "Last Name field cannot be empty.";
} elseif (empty($phone)) {
    echo "Phone field cannot be empty.";
} elseif (empty($email)) {
    echo "Email field cannot be empty.";
} elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "Email is invalid.";
} elseif (empty($address)) {
    echo "Address field cannot be empty.";
} elseif (!isset($_POST['gender'])) {
    echo "Choose Staff Gender.";
} else {

    //Generate random password for staff
    $gender = $_POST['gender'];
    $data = 'NHMHSTAFF1234567890nhmhstaff!@#$%&';

    $password = substr(str_shuffle($data), 0, 10);
    // Generate first username for staff
    $rand_user = rand(time(), 100000);
    if (
        $position == "Doctor"
    ) {
        $fix = "DOC";
        $username = $fix . $rand_user;
    } elseif ($position == "Nurse") {
        $fix = "NUR";
        $username = $fix . $rand_user;
    } elseif ($position == "Admin") {
        $fix = "ADMIN";
        $username = $fix . $rand_user;
    } elseif ($position == "Accountant") {
        $fix = "ACCT";
        $username = $fix . $rand_user;
    } elseif ($position == "Blogger") {
        $fix = "BLOG";
        $username = $fix . $rand_user;
    }

    // echo $password;
    // Generate first username for staff
    $rand_user = rand(time(), 100000);

    $rand_id = rand(time(), 100000000);
    $status = "Offline now";

    // check if username exists
    $checkemail = mysqli_query($conn, "select * from nhmh_staff_db where email = '$email' ");

    if (mysqli_num_rows($checkemail) > 0) {
        echo "Username you picked already exists.";
    } else {
        // insert inputs into database
        $inserttodb = mysqli_query($conn, "insert into nhmh_staff_db (unique_id,firstname,lastname,email,phone,address,gender,position,username,password,status) values('$rand_id', '$firstname', '$lastname', '$email', '$phone', '$address', '$gender', '$position', '$username', '$password', '$status') ");
        if ($inserttodb) {
            $sql2 = mysqli_query($conn, "select Staff_id from nhmh_staff_db where unique_id = '$rand_id' ");
            $sql2array = mysqli_fetch_assoc($sql2);
            $staff_id = $sql2array['Staff_id'];

            $emailSender = new EmailSender();
            $emailSender->sendEmailTwo($email, $firstname, $username, $password, 'Staff', 'newStaff', $staff_id);
            
            echo "Successful";
        } else {
            echo "An error occurred.";
        }
    }
}