<?php

$user_id = stripslashes($_SESSION['staff_uid']);
$sql = mysqli_query($conn, "select * from nhmh_staff_db where unique_id = '$user_id'");
if (mysqli_num_rows($sql) > 0) {
    $staff_info = mysqli_fetch_assoc($sql);
    $db_photo = $staff_info['photo'];
    $staff_image = "images/newLogo3.png";

    empty($db_photo) ? $staff_photo = $staff_image : $staff_photo = 'images/staff' . $db_photo;

    // getting the ids of patients
    $sql4 = mysqli_query($conn, "select * from nhmh_patient_db");

    $sql4_count = mysqli_num_rows($sql4);

    $sql5 = mysqli_query($conn, "select * from nhmh_patient_db");

    $sql6 = mysqli_query($conn, "select * from nhmh_patient_db");

    $today = date("Y-m-d");

    $doc = $staff_info['firstname'];

    $sql1 = mysqli_query($conn, "select * from nhmh_patient_appointment_db where doctor_to_see = '$doc' and app_date = '$today'  order by id desc");

    $sql1_count = mysqli_num_rows($sql1);


    $today1 = strtotime($today);
    $day = date('F', $today1);

    $sql7 = mysqli_query($conn, "select * from nhmh_patient_appointment_db where doctor_to_see = '$doc' and month = '$day' and app_date >= '$today' ");
    $sql7_count = mysqli_num_rows($sql7);

    $output1 = "";
    if (mysqli_num_rows($sql7) == 0) {
        $output1 .= '
                    <div id="optional_msg">
                    <span class="material-icons-sharp">
                            error
                        </span>
                        <p class="red">No Appointment set for this month yet, or they are in the past.</p>
                    </div>';
    }
    // echo $output;

} else {
    header("location: index");
}