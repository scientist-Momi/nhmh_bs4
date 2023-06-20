<?php
include_once "../includes/db_connector.php";

if (empty($_POST['trans_id'])) {
    echo json_encode([
        'status' => 401,
        'message' => ' Transaction ID not specified.'
    ]);
} else {
    $transaction_id = htmlspecialchars(strip_tags($_POST['trans_id']));

    $sql = mysqli_query($conn, "select * from nhmh_patient_accounts_db where transaction_id = '$transaction_id' ");
    if(mysqli_num_rows($sql) > 0){
        $result = mysqli_fetch_assoc($sql);

        echo json_encode([
            'status' => 200,
            'message' => [
                'patient_id' => $result['patient_id'],
                'fullname' => $result['fullname'],
                'service' => $result['payment_for'],
                'deposit' => number_format($result['deposited_amount'],2),
                'remain' => number_format($result['remaining_amount'],2),
                'transaction_id' => $result['transaction_id'],
                'date' => $result['date_of_transaction']
            ]
        ]);
        
    }else{
        echo json_encode([
            'status' => 401,
            'message' => ' No record found.'
        ]);
    }
}