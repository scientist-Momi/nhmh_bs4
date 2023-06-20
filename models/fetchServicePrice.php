<?php
include_once "../includes/db_connector.php";

$service_id = stripslashes($_GET['service_id']);

$sql1 = mysqli_query($conn, "select * from nhmh_services_db where id = '$service_id'");

$sql1_array = mysqli_fetch_assoc($sql1);

$price = $sql1_array['service_price'];

$downPay = $price / 4;

echo json_encode([
    'price' => $price,
    'downpay' => $downPay
]);