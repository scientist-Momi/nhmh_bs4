<?php
include_once "../includes/db_connector.php";


$delete_id = stripslashes($_GET['delete_id']);

$sql3 = mysqli_query($conn, "select * from nhmh_patients_payment_plans_db where plan_id = '$delete_id' ");
$sql3_array = mysqli_fetch_assoc($sql3);
$amount = $sql3_array['amount_to_pay'];
$trans_id = $sql3_array['transaction_id'];

$sql = mysqli_query($conn, "select * from nhmh_patient_accounts_db where transaction_id = '$trans_id' ");
$sql_array = mysqli_fetch_assoc($sql);

$deposit = $sql_array['deposited_amount'];
$remaining_money = $sql_array['remaining_amount'];

$new_deposit = $deposit + $amount;

$new_remain = $remaining_money - $amount;

$sql1 = mysqli_query($conn, "update nhmh_patient_accounts_db set deposited_amount = ' $new_deposit', remaining_amount = '$new_remain' where transaction_id = '$trans_id' ");

if ($sql1) {
    $sql2 = mysqli_query(
        $conn,
        "delete from nhmh_patients_payment_plans_db where transaction_id = '$trans_id' and plan_id = '$delete_id' "
    );
    if ($sql2) {
        header('location: ../accountant.dash.php');
        // echo  json_encode([
        //     'msg' => "successfull"
        // ]);
    } else {
        echo  json_encode([
            'msg' => "Something went wrong."
        ]);
    }
}