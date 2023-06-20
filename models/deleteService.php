<?php
include_once "../includes/db_connector.php";

$delete_id = stripslashes($_GET['delete_id']);

// echo "$delete_id";
$sql = mysqli_query($conn, "delete from nhmh_services_db where id = '$delete_id' ");

if ($sql) {
    echo  json_encode([
        'msg' => "successfull"
    ]);
}
