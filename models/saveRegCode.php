<?php
include_once "../includes/db_connector.php";

$reg_code = stripslashes($_GET['reg_code']);
$staff_name = stripslashes($_GET['staff_name']);

if (empty($reg_code) || $reg_code == 'undefined') {
    echo  json_encode([
        'msg' => "No Registration code"
    ]);
} else if (empty($staff_name) || $staff_name == 'undefined') {
    echo  json_encode([
        'msg' => "No Accountant ID"
    ]);
} else {
    $sql1 = mysqli_query($conn, "select * from nhmh_regcodes_db where code = '$reg_code' ");

    if (mysqli_num_rows($sql1) > 0) {
        echo  json_encode([
            'msg' => "Generate new code."
        ]);
    } else {

        $sql = mysqli_query($conn, "insert into nhmh_regcodes_db (code) values ('$reg_code') ");

        $trans_id = rand(time(), 1000);
        $service = "New Patient";
        $deposit = 1000;
        $price = 1000;
        $accountant = $staff_name;
        $today = date("Y-m-d");

        $month = date('F', strtotime($today));

        $sql2 = mysqli_query($conn, "insert into nhmh_patient_accounts_db (transaction_id,payment_for,amount_to_pay,deposited_amount,date_of_transaction,month_of_transaction,accountant_in_charge) values('$trans_id', '$service', '$price', '$deposit', '$today', '$month', '$accountant') ");

        if ($sql) {
            echo  json_encode([
                'msg' => "successfull"
            ]);
        }
    }
}
