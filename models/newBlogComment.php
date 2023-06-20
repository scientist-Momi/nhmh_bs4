<?php
include_once "../includes/db_connector.php";

// Getting all inputs from form
$commentname = stripslashes($_POST['name']);
$commentbody = stripslashes($_POST['comment']);
$postID = stripslashes($_POST['post_id']);

// Check if fields are empty
if (empty($commentname)) {
    echo "Please input your name.";
} elseif (empty($commentbody)) {
    echo "Your comment or contribution. Please.";
}else{
    $today = date("Y-m-d");
    $todaytime = date("H:i");

    $publish = date('F j, Y.', strtotime($today));

    $post_time = $publish . " " . $todaytime;

    $sql = mysqli_query($conn, "insert into nhmh_posts_comment_db (post_id,who_commented,comment,comment_date) values ('$postID', '$commentname', '$commentbody', '$post_time') ");

    if ($sql) {
        echo "Successful";
    } else {
        echo "An error occurred while adding your comment.";
    }
}