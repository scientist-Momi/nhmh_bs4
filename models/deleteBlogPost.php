<?php

include_once "../includes/db_connector.php";

$delete_id = stripslashes($_GET['post_id']);

// echo "$delete_id";
$sql = mysqli_query($conn, "delete from nhmh_blogposts_db where post_id = '$delete_id' ");

if ($sql) {
    echo  json_encode([
        'msg' => "successfull"
    ]);
}