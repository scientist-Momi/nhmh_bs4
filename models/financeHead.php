<?php
include_once "../includes/db_connector.php";

$patient_id = htmlspecialchars(strip_tags($_GET['patient_id']));

if (empty($patient_id)) {
    echo json_encode([
        'status' => 401,
        'message' => 'Patient ID not specified'
    ]);
} else {
    $sql1 = mysqli_query($conn, "select * from nhmh_patient_accounts_db where patient_id = '$patient_id' ");
    $sql1_array = mysqli_fetch_array($sql1);

    if (mysqli_num_rows($sql1) > 0) {



        $sql3 = mysqli_query($conn, "select sum(deposited_amount) as deposits from nhmh_patient_accounts_db where patient_id = '$patient_id' ");

        $sql3array = mysqli_fetch_array($sql3);

        $deposits = $sql3array['deposits'];

        $sql4 = mysqli_query($conn, "select sum(remaining_amount) as debts from nhmh_patient_accounts_db where patient_id = '$patient_id' ");

        $sql4array = mysqli_fetch_array($sql4);

        $debts = $sql4array['debts'];

        $deposit = number_format($deposits, 2);
        $debt = number_format($debts, 2);

        echo json_encode([
            'status' => 200,
            'value' => [
                'deposit' => $deposit,
                'debt' => $debt,
                'fullname' => $sql1_array['fullname'],
                'patient_id' => $sql1_array['patient_id']
            ]
        ]);
    } else {
        echo json_encode([
            'status' => 401,
            'message' => 'No Finance Record for Patient.'
        ]);
    }
}
