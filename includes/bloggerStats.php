<?php

$user_id = stripslashes($_SESSION['staff_uid']);
$sql = mysqli_query($conn, "select * from nhmh_staff_db where unique_id = '$user_id'");
if (mysqli_num_rows($sql) > 0) {
    $staff_info = mysqli_fetch_assoc($sql);
    $db_photo = $staff_info['photo'];
    $staff_image = "images/newLogo3.png";

    empty($db_photo) ? $staff_photo = $staff_image: $staff_photo= 'images/staff'.$db_photo;

    // counting the number of staff and getting their information
    $sql2 = mysqli_query($conn, "select * from nhmh_blogposts_db ");
    $blogcount = mysqli_num_rows($sql2);

    // counting the number of staff and getting their information
    $sql4 = mysqli_query($conn, "select * from nhmh_blogposts_db order by post_id desc");

    // counting the number of patients and getting their record
    $sql5 = mysqli_query($conn, "select * from nhmh_patient_db");
    // $patcount = mysqli_num_rows($sql3);

    // getting user log
    $sql6 = mysqli_query($conn, "select * from nhmh_users_log order by id desc");

    $sql8 = mysqli_query($conn, "select * from nhmh_blog_visits_db ");
    $totalviewcount = mysqli_num_rows($sql8);

    $sql9 = mysqli_query($conn, "select * from nhmh_posts_comment_db ");
    $totalcomm = mysqli_num_rows($sql9);

    $today = date("Y-m-d");
} else {
    header("location: index");
}
?>