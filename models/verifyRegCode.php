<?php
include_once "../includes/db_connector.php";

$reg_code = stripslashes($_GET['reg_code']);

$sql = mysqli_query($conn, "select * from nhmh_regcodes_db where code = '$reg_code' ");

if(mysqli_num_rows($sql) > 0){
    echo  json_encode([
        'msg' => 1
    ]);
}else{
    echo  json_encode([
        'msg' => 0
    ]);
}