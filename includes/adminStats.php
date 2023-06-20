<?php

$user_id = stripslashes($_SESSION['staff_uid']);
$sql = mysqli_query($conn, "select * from nhmh_staff_db where unique_id = '$user_id'");
if (mysqli_num_rows($sql) > 0) {
    $staff_info = mysqli_fetch_assoc($sql);
    $db_photo = $staff_info['photo'];
    $staff_image = "images/newLogo3.png";

    empty($db_photo) ? $staff_photo = $staff_image: $staff_photo= 'images/staff'.$db_photo;


    // counting the number of staff and getting their information
    $sql2 = mysqli_query($conn, "select * from nhmh_staff_db where not position = 'Admin' order by Staff_id");
    $staffcount = mysqli_num_rows($sql2);

    // counting the number of staff and getting their information
    $sql4 = mysqli_query($conn, "select * from nhmh_staff_db");
    // $staffcount = mysqli_num_rows($sql2);

    // counting the number of patients and getting their record
    $sql3 = mysqli_query($conn, "select * from nhmh_patient_db");
    $patcount = mysqli_num_rows($sql3);

    // counting the number of patients and getting their record
    $sql5 = mysqli_query($conn, "select * from nhmh_patient_db");
    // $patcount = mysqli_num_rows($sql3);

    // getting user log
    $sql6 = mysqli_query($conn, "select * from nhmh_users_log order by id desc");

    $sql7 = mysqli_query($conn, "select sum(remaining_amount) as debts from nhmh_patient_accounts_db");
    $sql7array = mysqli_fetch_array($sql7);
    $debts = $sql7array['debts'];

    $sql31 = mysqli_query($conn, "select sum(deposited_amount) as deposits from nhmh_patient_accounts_db");
    $sql31array = mysqli_fetch_array($sql31);
    $deposits = $sql31array['deposits'];

    $sql90 = mysqli_query($conn, "select * from nhmh_contact_form_db order by id desc ");

    $today = date("Y-m-d");
} else {
    header("location: index");
}