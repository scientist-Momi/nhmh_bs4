<?php

session_start();
include_once "../includes/db_connector.php";

$price = stripslashes($_POST['service_price']);
$downPay = stripslashes($_POST['downPay']);
$patient = stripslashes($_POST['patientID']);
$deposit = stripslashes($_POST['deposit']);
$modeofPay = stripslashes($_POST['modeofPay1']);
$planChoice = stripslashes($_POST['planChoice']);
$service = stripslashes($_POST['service']);


if (empty($deposit)) {
    echo json_encode([
        'status' => 401,
        'msg' => "Please specify how much patient is paying."
    ]);
} elseif (empty($planChoice)) {
    echo json_encode([
        'status' => 401,
        'msg' => "Choose installment plan for patient."
    ]);
} elseif (empty($patient)) {
    echo json_encode([
        'status' => 401,
        'msg' => "Patient ID not specified."
    ]);
} elseif (empty($modeofPay)) {
    echo json_encode([
        'status' => 401,
        'msg' => "Choose mode of payment."
    ]);
} else {
    if ($deposit < $downPay) {
        echo json_encode([
            'status' => 401,
            'msg' => "Deposit cannot be lesser than initial deposit."
        ]);
    } else if($deposit > $price){
        echo json_encode([
            'status' => 401,
            'msg' => "Deposit amount can not be greater than service price."
        ]);
    }
    else {
        $remains = $price - $deposit;

        $_SESSION['remains'] = $remains;

        $moneytoPay = $remains / $planChoice;


        $sql = mysqli_query($conn, "select edd_date from nhmh_patient_db where patient_id = '$patient' ");

        $sqlarray = mysqli_fetch_assoc($sql);
        $edd = $sqlarray['edd_date'];

        $today = date("Y-m-d");
        // $edd1 = date("d-m-Y", strtotime($edd));

        $edd1 = date('Y-m-d', strtotime($edd));

        $edd2 = date_diff(date_create($today), date_create($edd1));
        $edd3 = $edd2->format('%a');

        $interval = floor($edd3 / $planChoice);

        $hope = $edd3 / $interval;

        $firstday = $today;
        $output = "";
        if ($edd == "") {
            echo json_encode([
                'status' => 401,
                'msg' => "Patient without an EDD can not apply for installmental payment."
            ]);
        } else {
            for ($i = 1; $i <= $planChoice; $i++) {

                $firstday = date('Y-m-d', strtotime('+' . $interval . 'days', strtotime($firstday)));

                $output .= '

                        <div class="row">
                            <div class="col-md-6">
                                <label>Amount to Pay</label>
                                <h4>&#8358;' . number_format($moneytoPay, 2) . '</h4>
                            </div>
                            <div class="col-md-6">
                                <label>Date to Pay</label>
                                <h4>' . $firstday . '</h4>
                            </div>
                        </div>
                ';
            }

            echo json_encode([
                'status' => 200,
                'output' => $output,
                'remain' => $remains,
                'interval' => $interval,
                'money_to_pay' => $moneytoPay
            ]);
        }
    }
}
