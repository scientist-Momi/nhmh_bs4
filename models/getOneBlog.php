<?php

include_once "../includes/db_connector.php";

// Getting all inputs from form
$blog_id = stripslashes($_GET['blog_id']);

$sql = mysqli_query($conn, "select * from nhmh_blogposts_db where post_id = '$blog_id' ");

if(mysqli_num_rows($sql) > 0){
    $sql_array = mysqli_fetch_assoc($sql);
    echo json_encode([
        'msg' => 'successfull',
        'values' => [
            'title' => $sql_array['post_title'],
            'author' => $sql_array['post_author'],
            'body' => $sql_array['content']
        ]
    ]);
}