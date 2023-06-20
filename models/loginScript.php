<?php

session_start();
include_once "../includes/db_connector.php";

$username = stripslashes($_POST['username']);
$password = stripslashes($_POST['password']);
$status = "Active now";
// $position = stripslashes($_POST['position']);

if (empty($username)) {
    echo "Username field cannot be empty.";
} elseif (empty($password)) {
    echo "Password field cannot be empty.";
} else {

    $sql = mysqli_query($conn, "select * from nhmh_staff_db where username = '$username' ");
    $countRows1 = mysqli_num_rows($sql);
    $result1 = mysqli_fetch_assoc($sql);

    if($countRows1 > 0){
        $db_Ppass = $result1['password'];

        if($db_Ppass == $password){
            $_SESSION["staff_uid"] = $staff_uid  = $result1['unique_id'];
            $sql2 = mysqli_query($conn, "update nhmh_staff_db set status = '$status' WHERE unique_id= '$staff_uid' ");

            if($sql2){
                $current_date = date("y-m-d");
                $current_time = date("h:i");
                $action = "IN";

                $sql3 = mysqli_query($conn, "insert into nhmh_users_log (user_id, action, time, date) values('$staff_uid', '$action', '$current_time', '$current_date' ) ");

                if ($sql3) {
                    if ($result1['position'] === "Admin") {
                        echo "admin";
                    } elseif ($result1['position'] === "Nurse") {
                        echo "nurse";
                    } elseif ($result1['position'] === "Doctor") {
                        echo "doctor";
                    } elseif ($result1['position'] === "Accountant") {
                        echo "accountant";
                    } elseif ($result1['position'] === "Blogger") {
                        echo "blogger";
                    }
                }
            }
        }else{
            echo "Invalid credentials.";
        }
    }
    else{
        $sql1 = mysqli_query($conn, "select * from nhmh_patient_db where username = '$username' ");
        $countRows2 = mysqli_num_rows($sql1);
        $result2 = mysqli_fetch_assoc($sql1);

        if($countRows2 > 0){
            $db_pass = $result2['password'];

            if($db_pass == $password){
                $_SESSION["patient_uid"] = $patuid = $result2['unique_id'];

                $sql4 = mysqli_query($conn, "update nhmh_patient_db set status = '$status' WHERE unique_id = '$patuid' ");

                if($sql4){
                    echo "patient";
                }
            }else{
                echo "Invalid credentials";
            }
        }else{
            echo "Invalid credentials.";
        }
    }

    
}
