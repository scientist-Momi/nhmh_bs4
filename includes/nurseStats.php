<?php

$user_id = stripslashes($_SESSION['staff_uid']);
$sql = mysqli_query($conn, "select * from nhmh_staff_db where unique_id = '$user_id'");
if (mysqli_num_rows($sql) > 0) {
    $staff_info = mysqli_fetch_assoc($sql);
    $db_photo = $staff_info['photo'];
    $staff_image = "images/newLogo3.png";

    empty($db_photo) ? $staff_photo = $staff_image : $staff_photo = 'images/staff' . $db_photo;

    $today = date("Y-m-d");
    $sql1 = mysqli_query($conn, "select * from nhmh_patient_appointment_db where app_date = '$today' order by id desc");
    $sql1a = mysqli_query($conn, "select * from nhmh_patient_appointment_db where app_date = '$today' order by id desc");


    $sql1_count = mysqli_num_rows($sql1);

    $sql2 = mysqli_query($conn, "select * from nhmh_staff_db where status = 'Active now' and position = 'Doctor' ");
    $sql2a = mysqli_query($conn, "select * from nhmh_staff_db where position = 'Doctor' ");

    $sql2_count = mysqli_num_rows($sql2);

    $sql3 = mysqli_query($conn, "select * from nhmh_patient_db ");

    $sql3_count = mysqli_num_rows($sql3);

    $sql4 = mysqli_query($conn, "select * from nhmh_patient_db ");

    $sql6 = mysqli_query($conn, "select * from nhmh_patient_db ");

    //FOR PATIENTS

} else {
    header("location: index");
}
