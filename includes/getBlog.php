<?php
include_once "db_connector.php";

$post_id = stripslashes($_GET['post']);

$guest_ip = $_SERVER['REMOTE_ADDR'];
if (isset($guest_ip)) {
    $today = date("Y-m-d");
    $todaytime = date("H:i");

    $publish = date('F j, Y.', strtotime($today));

    $post_time = $publish . " " . $todaytime;

    $sql125 = mysqli_query($conn, "insert into nhmh_blog_visits_db (visitor_ip, visit_date, post_id) values ('$guest_ip', '$post_time', '$post_id')");
}



$sql = mysqli_query($conn, "select * from nhmh_blogposts_db where post_id = '$post_id' ");

$sql1 = mysqli_query($conn, "select * from nhmh_blogposts_db where not post_id = '$post_id' limit 2 ");

$sql2 = mysqli_query($conn, "select * from nhmh_posts_comment_db where post_id = '$post_id' order by comment_id desc ");

$sql_array = mysqli_fetch_assoc($sql);